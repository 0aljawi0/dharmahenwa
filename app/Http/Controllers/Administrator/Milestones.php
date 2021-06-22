<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Milestone;

class Milestones extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $milestones = Milestone::all();
        return view('administrator.milestones.list')->with('milestones', $milestones);
    }

    public function create()
    {
        return view('administrator.milestones.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $description['en'] = $request->description_en;
        $description['id'] = $request->description_id;

        $milestone = new Milestone;
        $milestone->title = json_encode($title);
        $milestone->description = json_encode($description);
        $milestone->image = $request->image;
        $milestone->year = $request->year;
        $saved = $milestone->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan milestone baru');

        if($saved) return redirect()->route('milestones.index')->with(['message' => 'Menambah milestone berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah milestone gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(Milestone $milestone)
    {}

    public function edit(Milestone $milestone)
    {
        // $milestone = milestone::firstWhere('id', $milestone->id);
        return view('administrator.milestones.edit')->with('milestone', $milestone);
    }

    public function update(Request $request, Milestone $milestone)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $description['en'] = $request->description_en;
        $description['id'] = $request->description_id;

        // $milestone = Milestone::firstWhere('id', $id);
        $milestone->title = json_encode($title);
        $milestone->description = json_encode($description);
        $milestone->image = $request->image;
        $milestone->year = $request->year;
        $saved = $milestone->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah milestone');

        if($saved) return redirect()->route('milestones.index')->with(['message' => 'Mengubah milestone berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah milestone gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(Milestone $milestone)
    {
        // $milestone = Milestone::firstWhere('id', $id);
        $delete = $milestone->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus milestone');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus milestone berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus milestone gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
