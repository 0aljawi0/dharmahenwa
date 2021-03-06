<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Meeting;

class Meetings extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meetings = Meeting::all();
        return view('administrator.meetings.list')->with('meetings', $meetings);
    }

    public function create()
    {
        return view('administrator.meetings.add');
    }

    public function store(Request $request)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $meeting = new Meeting;
        $meeting->title = json_encode($title);
        $meeting->year = $request->year;
        $meeting->pdf = $request->pdf;
        $saved = $meeting->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan meeting baru');

        if($saved) return redirect()->route('meetings.index')->with(['message' => 'Menambah meeting berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah meeting gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(Meeting $meeting)
    {}

    public function edit(Meeting $meeting)
    {
        // $meeting = Meeting::firstWhere('id', $id);
        return view('administrator.meetings.edit')->with('meeting', $meeting);
    }

    public function update(Request $request, Meeting $meeting)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        // $meeting = Meeting::firstWhere('id', $id);
        $meeting->title = json_encode($title);
        $meeting->year = $request->year;
        $meeting->pdf = $request->pdf;
        $saved = $meeting->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah meeting');

        if($saved) return redirect()->route('meetings.index')->with(['message' => 'Mengubah meeting berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah meeting gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(Meeting $meeting)
    {
        // $meeting = Meeting::firstWhere('id', $id);
        $delete = $meeting->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus meeting');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus meeting berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus meeting gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
