<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Auth;
use DB;
use Exception;
use Storage;

//class ProductsImport implements ToModel, WithHeadingRow, WithValidation
class ProductsImport implements ToCollection, WithHeadingRow, WithValidation, ToModel
{
    private $rows = 0;

    public function collection(Collection $rows)
    {
        $brands = Brand::all();
        $categories = Category::all();
        DB::enableQueryLog();
        foreach ($rows as $row) {


            $sku = $this->cleanSKU($row['product_code']);

            $brand = $brands->where('name', $row['brand'])->first();
            $category = explode('>', $row['category']);

            $parent_id = 0;
            foreach ($category as $key => $cat) {
                $c = $categories->where('name', 'LIKE', $cat)->where(
                    'parent_id',
                    $parent_id
                )->first();

                if ($c) {
                    $parent_id = $c->id;
                } else {
                    $c_new = Category::create([
                        'name' => $cat,
                        'parent_id' => $parent_id,
                        'level' => $key + 1,
                        'slug' => $this->categorySlug($cat),
                    ]);
                    $categories->push($c_new);
                    $parent_id = $c_new->id;
                }
            }

            if (isset($row['product_name']) && $row['product_name'] !== null) {
                $productId = Product::updateOrCreate([
                    'sku' => $sku,
                ], [
                    'name' => $row['product_name'],
                    'description' => $row['description'],
                    'short_description' => $row['short_description'],
                    'category_id' => $parent_id,
                    'brand_id' => $brand ? $brand->id : 0,

                    'video_provider' => '',
                    'video_link' => '',
                    'unit_price' => $row['price'] ?? 1,
                    'purchase_price' => $row['price'],
                    'unit' => '',

                    'slug' => $this->productSlug($row['product_name']),
                    // 'thumbnail_img' => $this->downloadThumbnail($row['thumbnail_img']),
                    // 'photos' => $this->downloadGalleryImages($row['photos']),

                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);

                ProductStock::updateOrCreate([
                    'product_id' => $productId->id,
                    'sku' => $sku,
                ], [
                    'qty' => (isset($row['quantity']) && $row['quantity'] !== NULL) ? $row['quantity'] : 1,
                    'price' => $row['price'] ?? 1,
                    'variant' => '',
                ]);
            }
        }

        flash(translate('Products imported successfully'))->success();
    }

    public function model(array $row)
    {
        ++$this->rows;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function productSlug($name)
    {
        $slug = Str::slug($name, '-');
        $same_slug_count = Product::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;

        return $slug;
    }
    public function categorySlug($name)
    {
        $slug = Str::slug($name, '-');
        $same_slug_count = Category::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;

        return $slug;
    }

    public function rules(): array
    {
        return [
            // Can also use callback validation rules
            'unit_price' => function ($attribute, $value, $onFailure) {
                if (!is_numeric($value)) {
                    $onFailure('Unit price is not numeric');
                }
            }
        ];
    }

    public function downloadThumbnail($url)
    {
        try {
            $upload = new Upload;
            $upload->external_link = $url;
            $upload->save();

            return $upload->id;
        } catch (\Exception $e) {
        }
        return null;
    }

    public function downloadGalleryImages($urls)
    {
        $data = array();
        foreach (explode(',', str_replace(' ', '', $urls)) as $url) {
            $data[] = $this->downloadThumbnail($url);
        }
        return implode(',', $data);
    }

    public function cleanSKU($sku)
    {
        $sku = trim($sku);
        $sku = preg_replace('/[^a-zA-Z0-9\-\_]/i', '', $sku);
        return $sku;
    }
}
