<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Committee;

class Committees extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $committees = Committee::all();
        return view('administrator.committees.list')->with('committees', $committees);
    }

    public function create()
    {
        return view('administrator.committees.add');
    }

    public function store(Request $request)
    {
        $position['id'] = $request->position_id;
        $position['en'] = $request->position_en;

        $bio['id'] = $request->bio_id;
        $bio['en'] = $request->bio_en;

        $committee = new Committee;
        $committee->photo = $request->photo;
        $committee->name = $request->name;
        $committee->position = json_encode($position);
        $committee->bio = json_encode($bio);
        $committee->type = $request->type;
        $saved = $committee->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan committee baru');

        if($saved) return redirect()->route('committees.index')->with(['message' => 'Menambah committee berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah committee gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $committee = Committee::firstWhere('id', $id);
        return view('administrator.committees.edit')->with('committee', $committee);
    }

    public function update(Request $request, $id)
    {
        $position['id'] = $request->position_id;
        $position['en'] = $request->position_en;

        $bio['id'] = $request->bio_id;
        $bio['en'] = $request->bio_en;

        $committee = Committee::firstWhere('id', $id);
        $committee->photo = $request->photo;
        $committee->name = $request->name;
        $committee->position = json_encode($position);
        $committee->bio = json_encode($bio);
        $committee->type = $request->type;
        $saved = $committee->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah committee');

        if($saved) return redirect()->route('committees.index')->with(['message' => 'Mengubah committee berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah committee gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $committee = Committee::firstWhere('id', $id);
        $delete = $committee->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus committee');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus committee berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus committee gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
