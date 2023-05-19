@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">{{ translate('Add New Product') }}</h5>
    </div>
    <div class="">
        <form class="form form-horizontal mar-top" action="{{ route('products.store') }}" method="POST"
            enctype="multipart/form-data" id="choice_form">
            <div class="row gutters-5">
                <div class="col-lg-8">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Information') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Product Name') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="{{ translate('Product Name') }}" onchange="title_update(this)"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row" id="category">
                                <label class="col-md-3 col-from-label">{{ translate('Category') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                        data-live-search="true" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}
                                            </option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('categories.child_category', [
                                                    'child_category' => $childCategory,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="brand">
                                <label class="col-md-3 col-from-label">{{ translate('Brand') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                        data-live-search="true">
                                        <option value="">{{ translate('Select Brand') }}</option>
                                        @foreach (\App\Models\Brand::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Unit') }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="unit"
                                        placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Minimum Purchase Qty') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="number" lang="en" class="form-control" name="min_qty" value="1"
                                        min="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Tags') }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="tags[]"
                                        placeholder="{{ translate('Type and hit enter to add a tag') }}">
                                    <small
                                        class="text-muted">{{ translate('This is used for search. Input those words by which cutomer can find this product.') }}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">{{ translate('Slug') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="{{ translate('Slug') }}" id="slug"
                                        name="slug" required class="form-control">
                                    @error('slug')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Images') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">{{ translate('Gallery Images') }}
                                    <small>(600x600)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image"
                                        data-multiple="true">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="photos" id="photos" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small
                                        class="text-muted">{{ translate('These images are visible in product details page gallery. Use 600x600 sizes images.') }}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">{{ translate('Thumbnail Image') }}
                                    <small>(300x300)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="thumbnail_img" id="thumbnail_img"
                                            class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small
                                        class="text-muted">{{ translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Variation') }}</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="form-group row gutters-5">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{ translate('Colors') }}"
                                        disabled>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" data-live-search="true"
                                        data-selected-text-format="count" name="colors[]" id="colors" multiple
                                        disabled>
                                        @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)
                                            <option value="{{ $color->code }}"
                                                data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>">
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input value="1" type="checkbox" name="colors_active">
                                        <span></span>
                                    </label>
                                </div>
                            </div> --}}

                            <div class="form-group row gutters-5">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{ translate('Attributes') }}"
                                        disabled>
                                </div>
                                <div class="col-md-8">
                                    <select name="choice_attributes[]" id="choice_attributes"
                                        class="form-control aiz-selectpicker" data-selected-text-format="count"
                                        data-live-search="true" multiple
                                        data-placeholder="{{ translate('Choose Attributes') }}">
                                        @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}
                                </p>
                                <br>
                            </div>

                            <div class="customer_choice_options" id="customer_choice_options">

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product price + stock') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Unit price') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="0.01"
                                        placeholder="{{ translate('Unit price') }}" name="unit_price"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label"
                                    for="date_range">{{ translate('Discount Date Range') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control aiz-date-range" id="date_range"
                                        name="date_range" placeholder="{{ translate('Select Date') }}"
                                        data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to "
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Discount') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="0.01"
                                        placeholder="{{ translate('Discount') }}" name="discount" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control aiz-selectpicker" name="discount_type">
                                        <option value="amount">{{ translate('Flat') }}</option>
                                        <option value="percent">{{ translate('Percent') }}</option>
                                    </select>
                                </div>
                            </div>

                            @if (addon_is_activated('club_point'))
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">
                                        {{ translate('Set Point') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" lang="en" min="0" value="0"
                                            step="1" placeholder="{{ translate('1') }}" name="earn_point"
                                            class="form-control">
                                    </div>
                                </div>
                            @endif

                            <div id="show-hide-div">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{ translate('Quantity') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" lang="en" min="0" value="0"
                                            step="1" placeholder="{{ translate('Quantity') }}"
                                            name="current_stock" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">
                                        {{ translate('SKU') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="{{ translate('SKU') }}" name="sku"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="sku_combination" id="sku_combination">

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Description') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Description') }}</label>
                                <div class="col-md-8">
                                    <textarea class="aiz-text-editor" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card repeater">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Tabs') }}</h5>
                        </div>
                        <div class="card-body">
                            <div data-repeater-list="tabs">
                                <div data-repeater-item>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Heading') }}</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="tab_heading">
                                        </div>
                                        <input data-repeater-delete type="button" class="btn btn-danger action-btn"
                                            value="Delete" />
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{ translate('Description') }}</label>
                                        <div class="col-md-8">
                                            <textarea class="text-area" name="tab_description"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success action-btn"
                                value="Add" />
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Dimensions') }}</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Length') }}</label>
                                <div class="col-md-6">
                                    <input type="number" step="0.01" placeholder="{{ translate('Length') }}"
                                        name="length" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Height') }}</label>
                                <div class="col-md-6">
                                    <input type="number" step="0.01" placeholder="{{ translate('Height') }}"
                                        name="height" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Width') }}</label>
                                <div class="col-md-6">
                                    <input type="number" step="0.01" placeholder="{{ translate('Width') }}"
                                        name="width" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Weight') }}</label>
                                <div class="col-md-6">
                                    <input type="number" step="0.01" placeholder="{{ translate('Weight') }}"
                                        name="weight" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <h5 class="mb-0 h6">{{ translate('Product Shipping Cost') }}</h5>
                                                                                                    </div>
                                                                                                    <div class="card-body">

                                                                                                    </div>
                                                                                                </div>-->


                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Product Videos') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Video Provider') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control aiz-selectpicker" name="video_provider"
                                        id="video_provider">
                                        <option value="youtube">{{ translate('Youtube') }}</option>
                                        <option value="dailymotion">{{ translate('Dailymotion') }}</option>
                                        <option value="vimeo">{{ translate('Vimeo') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Video Link') }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="video_link"
                                        placeholder="{{ translate('Video Link') }}">
                                    <small
                                        class="text-muted">{{ translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.") }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('PDF Specification') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">{{ translate('PDF Specification') }}</label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="document">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="pdf" id="pdf" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('External link') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{ translate('External link') }}
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{ translate('External link') }}"
                                        name="external_link" class="form-control">
                                    <small
                                        class="text-muted">{{ translate('Leave it blank if you do not use external site link') }}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{ translate('External link button text') }}
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{ translate('External link button text') }}"
                                        name="external_link_btn" class="form-control">
                                    <small
                                        class="text-muted">{{ translate('Leave it blank if you do not use external site link') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('SEO Meta Tags') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('Meta Title') }}</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="{{ translate('Meta Title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('Description') }}</label>
                                <div class="col-lg-8">
                                    <textarea name="meta_description" rows="8" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{ translate('Keywords') }}</label>
                                <div class="col-md-8">
                                    {{-- data-max-tags="1" --}}
                                    <input type="text" class="form-control aiz-tag-input" name="meta_keywords[]"
                                        placeholder="{{ translate('Type and hit enter to add a keyword') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('OG Title') }}</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="og_title"
                                        placeholder="{{ translate('OG Title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('OG Description') }}</label>
                                <div class="col-lg-8">
                                    <textarea name="og_description" rows="8" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('Twitter Title') }}</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="twitter_title"
                                        placeholder="{{ translate('Twitter Title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-from-label">{{ translate('Twitter Description') }}</label>
                                <div class="col-lg-8">
                                    <textarea name="twitter_description" rows="8" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card bg-transparent shadow-none border-0">
                        <div class="card-body p-0">
                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" name="button" value="draft"
                                        class="btn btn-warning action-btn">{{ translate('Save As Draft') }}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Third group">
                                    <button type="submit" name="button" value="unpublish"
                                        class="btn btn-primary action-btn">{{ translate('Save & Unpublish') }}</button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Second group">
                                    <button type="submit" name="button" value="publish"
                                        class="btn btn-success action-btn">{{ translate('Save & Publish') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Low Stock Quantity Warning') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="low_stock_quantity">
                                    {{ translate('Quantity') }}
                                </label>
                                <input type="number" name="low_stock_quantity" id="low_stock_quantity" value="1"
                                    min="0" step="1" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">
                                {{ translate('Stock Visibility State') }}
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{ translate('Show Stock Quantity') }}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="radio" name="stock_visibility_state" value="quantity" checked>
                                        <span></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-md-6 col-from-label">{{ translate('Show Stock With Text Only') }}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="radio" name="stock_visibility_state" value="text">
                                        <span></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{ translate('Hide Stock') }}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="radio" name="stock_visibility_state" value="hide">
                                        <span></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Featured') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{ translate('Status') }}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" name="featured" value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Return and refund status') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{ translate('Status') }}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" name="return_refund" value="0">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <button type="submit" name="button" value="draft"
                                class="btn btn-warning action-btn">{{ translate('Save As Draft') }}</button>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <button type="submit" name="button" value="unpublish"
                                class="btn btn-primary action-btn">{{ translate('Save & Unpublish') }}</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Second group">
                            <button type="submit" name="button" value="publish"
                                class="btn btn-success action-btn">{{ translate('Save & Publish') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.repeater').repeater({
            initEmpty: true,
            show: function() {
                $(this).slideDown();

                buttons = [
                    ["font", ["bold", "underline", "italic", "clear"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["style", ["style"]],
                    ["color", ["color"]],
                    ["table", ["table"]],
                    ["insert", ["link", "picture", "video"]],
                    ["view", ["fullscreen", "undo", "redo"]],
                ];

                note = $(this).find('.text-area').summernote({
                    toolbar: buttons,
                    height: 200,
                    callbacks: {
                        onImageUpload: function(data) {
                            data.pop();
                        },
                        onPaste: function(e) {
                            if (format) {
                                var bufferText = ((e.originalEvent || e).clipboardData || window
                                    .clipboardData).getData('Text');
                                e.preventDefault();
                                document.execCommand('insertText', false, bufferText);
                            }
                        }
                    }
                });

                var nativeHtmlBuilderFunc = note.summernote('module', 'videoDialog').createVideoNode;

                note.summernote('module', 'videoDialog').createVideoNode = function (url) {
                    var wrap = $('<div class="embed-responsive embed-responsive-16by9"></div>');
                    var html = nativeHtmlBuilderFunc(url);
                    html = $(html).addClass('embed-responsive-item');
                    return wrap.append(html)[0];
                };

            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
        });
    </script>

    <script type="text/javascript">
        $('form').bind('submit', function(e) {
            if ($(".action-btn").attr('attempted') == 'true') {
                //stop submitting the form because we have already clicked submit.
                e.preventDefault();
            } else {
                $(".action-btn").attr("attempted", 'true');
            }
            // Disable the submit button while evaluating if the form should be submitted
            // $("button[type='submit']").prop('disabled', true);

            // var valid = true;

            // if (!valid) {
            // e.preventDefault();

            ////Reactivate the button if the form was not submitted
            // $("button[type='submit']").button.prop('disabled', false);
            // }
        });

        $("[name=shipping_type]").on("change", function() {
            $(".flat_rate_shipping_div").hide();

            if ($(this).val() == 'flat_rate') {
                $(".flat_rate_shipping_div").show();
            }

        });

        function add_more_customer_choice_option(i, name) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '{{ route('products.add-more-choice-option') }}',
                data: {
                    attribute_id: i
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    $('#customer_choice_options').append(
                        '\
                                                                                                <div class="form-group row">\
                                                                                                    <div class="col-md-3">\
                                                                                                        <input type="hidden" name="choice_no[]" value="' +
                        i +
                        '">\
                                                                                                        <input type="text" class="form-control" name="choice[]" value="' +
                        name +
                        '" placeholder="{{ translate('Choice Title') }}" readonly>\
                                                                                                    </div>\
                                                                                                    <div class="col-md-8">\
                                                                                                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_' +
                        i + '[]" multiple>\
                                                                                                            ' + obj + '\
                                                                                                        </select>\
                                                                                                    </div>\
                                                                                                </div>');
                    AIZ.plugins.bootstrapSelect('refresh');
                }
            });


        }

        function title_update(e) {
            update_sku();
            title = e.value;
            title = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '')
            $('#slug').val(title)
        }

        $('input[name="colors_active"]').on('change', function() {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors').prop('disabled', true);
                AIZ.plugins.bootstrapSelect('refresh');
            } else {
                $('#colors').prop('disabled', false);
                AIZ.plugins.bootstrapSelect('refresh');
            }
            update_sku();
        });

        $(document).on("change", ".attribute_choice", function() {
            update_sku();
        });

        $('#colors').on('change', function() {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });

        $('input[name="name"]').on('keyup', function() {
            update_sku();
        });

        function delete_row(em) {
            $(em).closest('.form-group row').remove();
            update_sku();
        }

        function delete_variant(em) {
            $(em).closest('.variant').remove();
        }

        function update_sku() {
            $.ajax({
                type: "POST",
                url: '{{ route('products.sku_combination') }}',
                data: $('#choice_form').serialize(),
                success: function(data) {
                    $('#sku_combination').html(data);
                    AIZ.uploader.previewGenerate();
                    AIZ.plugins.fooTable();
                    if (data.length > 1) {
                        $('#show-hide-div').hide();
                    } else {
                        $('#show-hide-div').show();
                    }
                }
            });
        }

        $('#choice_attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function() {
                add_more_customer_choice_option($(this).val(), $(this).text());
            });

            update_sku();
        });
    </script>
@endsection
