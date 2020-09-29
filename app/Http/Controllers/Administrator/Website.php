<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class Website extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'website-profile');
        return view('administrator.website')->with('data', $data);
    }

    public function store(Request $request)
    {
        $value['logo'] = $request->logo;
        $value['favicon'] = $request->favicon;
        $value['title'] = $request->title;
        $value['description'] = $request->description;
        $value['keyword'] = $request->keyword;
        $value['author'] = $request->author;
        $value['sitename'] = $request->sitename;
        $value['phone'] = $request->phone;
        $value['email'] = $request->email;
        $value['footer_description'] = $request->footer_description;
        $value['page_title_image'] = $request->page_title_image;

        $option = new Option;
        $option->key = 'website-profile';
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah profile');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah profile berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah profile gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $value['logo'] = $request->logo;
        $value['favicon'] = $request->favicon;
        $value['title'] = $request->title;
        $value['description'] = $request->description;
        $value['keyword'] = $request->keyword;
        $value['author'] = $request->author;
        $value['sitename'] = $request->sitename;
        $value['phone'] = $request->phone;
        $value['email'] = $request->email;
        $value['footer_description'] = $request->footer_description;
        $value['page_title_image'] = $request->page_title_image;

        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah profile');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah profile berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah profile gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
