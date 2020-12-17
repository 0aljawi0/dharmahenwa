<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class HomeSection extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'home-section');
        return view('administrator.home_section')->with('data', $data);
    }

    public function store(Request $request)
    {
        $option = new Option;
        $option->key = 'home-section';
        $option->value = json_encode($request->all());
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah home section');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah home section berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah home section gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($request->all());
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah home section');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah home section berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah home section gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
