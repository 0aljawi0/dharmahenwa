<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Summernote extends Controller
{
    public function upload (Request $request)
    {
        $directory = 'summernote';
        $image_name = 'summernote'.date('YmdHis').'.';

        if ($request->image) {
            $image_name = $image_name.$request->image->getClientOriginalExtension();
            $store = $request->image->storeAs('public/'.$directory, $image_name);
            if ($store) $image_url = $directory.'/'.$image_name;
        }

        $callback['image'] = URL::to('storage/'.$image_url);
        return response()->json($callback);
    }
}
