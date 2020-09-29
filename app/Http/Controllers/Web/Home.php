<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Slider;

class Home extends Controller
{
    public function index()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['sliders'] = Slider::all();

        return view('web.home')->with($data);
    }
}
