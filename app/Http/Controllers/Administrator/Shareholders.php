<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Shareholder;

class Shareholders extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shareholders = Shareholder::all();
        return view('administrator.shareholders.list')->with('shareholders', $shareholders);
    }

    public function create()
    {
        return view('administrator.shareholders.add');
    }

    public function store(Request $request)
    {
        $shareholder = new Shareholder;
        $shareholder->name = $request->name;
        $shareholder->share = $request->share;
        $shareholder->percent = $request->percent;
        $saved = $shareholder->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan shareholder baru');

        if($saved) return redirect()->route('shareholders.index')->with(['message' => 'Menambah shareholder berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah shareholder gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $shareholder = Shareholder::firstWhere('id', $id);
        return view('administrator.shareholders.edit')->with('shareholder', $shareholder);
    }

    public function update(Request $request, $id)
    {
        $shareholder = Shareholder::firstWhere('id', $id);
        $shareholder->name = $request->name;
        $shareholder->share = $request->share;
        $shareholder->percent = $request->percent;
        $saved = $shareholder->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah shareholder');

        if($saved) return redirect()->route('shareholders.index')->with(['message' => 'Mengubah shareholder berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah shareholder gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $shareholder = Shareholder::firstWhere('id', $id);
        $delete = $shareholder->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus shareholder');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus shareholder berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus shareholder gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
