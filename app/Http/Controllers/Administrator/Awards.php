<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Award;

class Awards extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $awards = Award::all();
        return view('administrator.awards.list')->with('awards', $awards);
    }

    public function create()
    {
        return view('administrator.awards.add');
    }

    public function store(Request $request)
    {
        $award = new Award;
        $award->image = $request->image;
        $award->description = $request->description;
        $award->type = $request->type;
        $award->year = $request->year;
        $saved = $award->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan award baru');

        if($saved) return redirect()->route('awards.index')->with(['message' => 'Menambah award berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah award gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $award = Award::firstWhere('id', $id);
        return view('administrator.awards.edit')->with('award', $award);
    }

    public function update(Request $request, $id)
    {
        $award = Award::firstWhere('id', $id);
        $award->image = $request->image;
        $award->description = $request->description;
        $award->type = $request->type;
        $award->year = $request->year;
        $saved = $award->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah award');

        if($saved) return redirect()->route('awards.index')->with(['message' => 'Mengubah award berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah award gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $award = Award::firstWhere('id', $id);
        $delete = $award->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus award');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus award berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus award gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
