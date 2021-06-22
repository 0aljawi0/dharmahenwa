<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Presentation;

class Presentations extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $presentations = Presentation::all();
        return view('administrator.presentations.list')->with('presentations', $presentations);
    }

    public function create()
    {
        return view('administrator.presentations.add');
    }

    public function store(Request $request)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $presentation = new Presentation;
        $presentation->title = json_encode($title);
        $presentation->image = $request->image;
        $presentation->pdf = $request->pdf;
        $saved = $presentation->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan presentation baru');

        if($saved) return redirect()->route('presentations.index')->with(['message' => 'Menambah presentation berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah presentation gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(Presentation $presentation)
    {}

    public function edit(Presentation $presentation)
    {
        // $presentation = Presentation::firstWhere('id', $id);
        return view('administrator.presentations.edit')->with('presentation', $presentation);
    }

    public function update(Request $request, Presentation $presentation)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        // $presentation = Presentation::firstWhere('id', $id);
        $presentation->title = json_encode($title);
        $presentation->image = $request->image;
        $presentation->pdf = $request->pdf;
        $saved = $presentation->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah presentation');

        if($saved) return redirect()->route('presentations.index')->with(['message' => 'Mengubah presentation berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah presentation gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(Presentation $presentation)
    {
        // $presentation = Presentation::firstWhere('id', $id);
        $delete = $presentation->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus presentation');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus presentation berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus presentation gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
