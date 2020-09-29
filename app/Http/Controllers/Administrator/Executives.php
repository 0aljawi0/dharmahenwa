<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Executive;

class Executives extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $executives = Executive::all();
        return view('administrator.executives.list')->with('executives', $executives);
    }

    public function create()
    {
        return view('administrator.executives.add');
    }

    public function store(Request $request)
    {
        $executive = new Executive;
        $executive->name = $request->name;
        $executive->position = $request->position;
        $executive->bio = $request->bio;
        $executive->board = $request->board;
        $executive->photo = $request->photo;
        $saved = $executive->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan executive baru');

        if($saved) return redirect()->route('executives.index')->with(['message' => 'Menambah executive berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah executive gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $executive = Executive::firstWhere('id', $id);
        return view('administrator.executives.edit')->with('executive', $executive);
    }

    public function update(Request $request, $id)
    {
        $executive = Executive::firstWhere('id', $id);
        $executive->name = $request->name;
        $executive->position = $request->position;
        $executive->bio = $request->bio;
        $executive->board = $request->board;
        $executive->photo = $request->photo;
        $saved = $executive->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah executive');

        if($saved) return redirect()->route('executives.index')->with(['message' => 'Mengubah executive berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah executive gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $executive = Executive::firstWhere('id', $id);
        $delete = $executive->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus executive');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus executive berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus executive gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
