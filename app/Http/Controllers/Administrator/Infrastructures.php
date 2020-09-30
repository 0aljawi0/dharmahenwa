<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Infrastructure;

class Infrastructures extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $infrastructures = Infrastructure::all();
        return view('administrator.infrastructures.list')->with('infrastructures', $infrastructures);
    }

    public function create()
    {
        return view('administrator.infrastructures.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $infrastructure = new infrastructure;
        $infrastructure->title = json_encode($title);
        $infrastructure->image = $request->image;
        $saved = $infrastructure->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan infrastructure baru');

        if($saved) return redirect()->route('infrastructures.index')->with(['message' => 'Menambah infrastructure berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah infrastructure gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $infrastructure = Infrastructure::firstWhere('id', $id);
        return view('administrator.infrastructures.edit')->with('infrastructure', $infrastructure);
    }

    public function update(Request $request, $id)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $infrastructure = Infrastructure::firstWhere('id', $id);
        $infrastructure->title = json_encode($title);
        $infrastructure->image = $request->image;
        $saved = $infrastructure->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah infrastructure');

        if($saved) return redirect()->route('infrastructures.index')->with(['message' => 'Mengubah infrastructure berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah infrastructure gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $infrastructure = Infrastructure::firstWhere('id', $id);
        $delete = $infrastructure->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus infrastructure');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus infrastructure berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus infrastructure gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
