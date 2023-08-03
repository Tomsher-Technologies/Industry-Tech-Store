<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TempImageExport;
use App\Http\Controllers\Controller;
use App\Models\Utilities\TempImage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TempImageController extends Controller
{
    public function index()
    {
        return view('backend.tempimages.index');
    }

    public function listAll()
    {
        // $images = TempImage::all();
        return Excel::download(new TempImageExport, 'users.xlsx');

        // return view('backend.tempimages.list', compact('images'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $path = 'tempuploads/' . date('d-m-y') . '/';
                $file->storeAs($path, $filename);

                TempImage::create([
                    'name' =>  pathinfo($filename, PATHINFO_FILENAME),
                    'ext' => $extension,
                    'path' =>  $path . $filename
                ]);
            }
        }
    }
}
