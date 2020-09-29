<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class MVV extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'mvv');
        return view('administrator.mvv')->with('data', $data);
    }

    public function store(Request $request)
    {
        $value['mission_image'] = $request->mission_image;
        $value['vision_image'] = $request->vision_image;
        $value['mission_en'] = $request->mission_en;
        $value['mission_id'] = $request->mission_id;
        $value['vision_en'] = $request->vision_en;
        $value['vision_id'] = $request->vision_id;

        $value['corporate_value_1_en'] = $request->corporate_value_1_en;
        $value['corporate_value_1_id'] = $request->corporate_value_1_id;
        $value['corporate_value_1_icon'] = $request->corporate_value_1_icon;

        $value['corporate_value_2_en'] = $request->corporate_value_2_en;
        $value['corporate_value_2_id'] = $request->corporate_value_2_id;
        $value['corporate_value_2_icon'] = $request->corporate_value_2_icon;

        $value['corporate_value_3_en'] = $request->corporate_value_3_en;
        $value['corporate_value_3_id'] = $request->corporate_value_3_id;
        $value['corporate_value_3_icon'] = $request->corporate_value_3_icon;

        $value['corporate_value_4_en'] = $request->corporate_value_4_en;
        $value['corporate_value_4_id'] = $request->corporate_value_4_id;
        $value['corporate_value_4_icon'] = $request->corporate_value_4_icon;

        $value['corporate_value_5_en'] = $request->corporate_value_5_en;
        $value['corporate_value_5_id'] = $request->corporate_value_5_id;
        $value['corporate_value_5_icon'] = $request->corporate_value_5_icon;

        $option = new Option;
        $option->key = 'mvv';
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah Mission Vision Value');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah Mission Vision Value berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah Mission Vision Value gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $value['image'] = $request->image;
        $value['mission_image'] = $request->mission_image;
        $value['vision_image'] = $request->vision_image;

        $value['title_en'] = $request->title_en;
        $value['title_id'] = $request->title_id;

        $value['mission_en'] = $request->mission_en;
        $value['mission_id'] = $request->mission_id;
        $value['vision_en'] = $request->vision_en;
        $value['vision_id'] = $request->vision_id;

        $value['corporate_value_1_en'] = $request->corporate_value_1_en;
        $value['corporate_value_1_id'] = $request->corporate_value_1_id;
        $value['corporate_value_1_icon'] = $request->corporate_value_1_icon;

        $value['corporate_value_2_en'] = $request->corporate_value_2_en;
        $value['corporate_value_2_id'] = $request->corporate_value_2_id;
        $value['corporate_value_2_icon'] = $request->corporate_value_2_icon;

        $value['corporate_value_3_en'] = $request->corporate_value_3_en;
        $value['corporate_value_3_id'] = $request->corporate_value_3_id;
        $value['corporate_value_3_icon'] = $request->corporate_value_3_icon;

        $value['corporate_value_4_en'] = $request->corporate_value_4_en;
        $value['corporate_value_4_id'] = $request->corporate_value_4_id;
        $value['corporate_value_4_icon'] = $request->corporate_value_4_icon;

        $value['corporate_value_5_en'] = $request->corporate_value_5_en;
        $value['corporate_value_5_id'] = $request->corporate_value_5_id;
        $value['corporate_value_5_icon'] = $request->corporate_value_5_icon;

        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah Mission Vision Value');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah Mission Vision Value berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah Mission Vision Value gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
