<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class MissionVisionValue extends Controller
{
    public function index()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['mvv'] = Option::firstWhere('key', 'mvv');

        return view('web.mvv')->with($data);
    }
}
