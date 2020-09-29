<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class ManageCompanyProfile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'company-profile');
        return view('administrator.manage_company_profile')->with('data', $data);
    }

    public function store(Request $request)
    {
        $value['image'] = $request->image;
        $value['title_en'] = $request->title_en;
        $value['title_id'] = $request->title_id;
        $value['description_en'] = $request->description_en;
        $value['description_id'] = $request->description_id;

        $option = new Option;
        $option->key = 'company-profile';
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah company profile');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah company profile berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah company profile gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $value['image'] = $request->image;
        $value['title_en'] = $request->title_en;
        $value['title_id'] = $request->title_id;
        $value['description_en'] = $request->description_en;
        $value['description_id'] = $request->description_id;

        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah company profile');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah company profile berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah company profile gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
