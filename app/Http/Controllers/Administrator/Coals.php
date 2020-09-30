<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Coal;

class Coals extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coals = Coal::all();
        return view('administrator.coals.list')->with('coals', $coals);
    }

    public function create()
    {
        return view('administrator.coals.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $description['en'] = $request->description_en;
        $description['id'] = $request->description_id;

        $coal = new Coal;
        $coal->title = json_encode($title);
        $coal->description = json_encode($description);
        $coal->image = $request->image;
        $saved = $coal->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan coal baru');

        if($saved) return redirect()->route('coals.index')->with(['message' => 'Menambah coal berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah coal gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $coal = Coal::firstWhere('id', $id);
        return view('administrator.coals.edit')->with('coal', $coal);
    }

    public function update(Request $request, $id)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $description['en'] = $request->description_english;
        $description['id'] = $request->description_indonesia;

        $coal = Coal::firstWhere('id', $id);
        $coal->title = json_encode($title);
        $coal->description = json_encode($description);
        $coal->image = $request->image;
        $saved = $coal->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah coal');

        if($saved) return redirect()->route('coals.index')->with(['message' => 'Mengubah coal berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah coal gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $coal = Coal::firstWhere('id', $id);
        $delete = $coal->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus coal');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus coal berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus coal gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
