<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Sustainability;

class Sustainabilities extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sustainabilities = Sustainability::all();
        return view('administrator.sustainabilities.list')->with('sustainabilities', $sustainabilities);
    }

    public function create()
    {
        return view('administrator.sustainabilities.add');
    }

    public function store(Request $request)
    {
        $sustainability = new Sustainability;
        $sustainability->title = $request->title;
        $sustainability->image = $request->image;
        $sustainability->pdf = $request->pdf;
        $saved = $sustainability->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan sustainability baru');

        if($saved) return redirect()->route('sustainabilities.index')->with(['message' => 'Menambah sustainability berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah sustainability gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(Sustainability $sustainability)
    {}

    public function edit(Sustainability $sustainability)
    {
        // $sustainability = Sustainability::firstWhere('id', $id);
        return view('administrator.sustainabilities.edit')->with('sustainability', $sustainability);
    }

    public function update(Request $request, Sustainability $sustainability)
    {
        // $sustainability = Sustainability::firstWhere('id', $id);
        $sustainability->title = $request->title;
        $sustainability->image = $request->image;
        $sustainability->pdf = $request->pdf;
        $saved = $sustainability->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah sustainability');

        if($saved) return redirect()->route('sustainabilities.index')->with(['message' => 'Mengubah sustainability berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah sustainability gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(Sustainability $sustainability)
    {
        // $sustainability = Sustainability::firstWhere('id', $id);
        $delete = $sustainability->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus sustainability');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus sustainability berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus sustainability gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
