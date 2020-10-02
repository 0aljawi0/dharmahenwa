<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Newsletter;

class Newsletters extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $newsletters = Newsletter::all();
        return view('administrator.newsletters.list')->with('newsletters', $newsletters);
    }

    public function create()
    {
        return view('administrator.newsletters.add');
    }

    public function store(Request $request)
    {
        $newsletter = new Newsletter;
        $newsletter->title = $request->title;
        $newsletter->pdf = $request->pdf;
        $saved = $newsletter->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan newsletter baru');

        if($saved) return redirect()->route('newsletters.index')->with(['message' => 'Menambah newsletter berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah newsletter gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $newsletter = Newsletter::firstWhere('id', $id);
        return view('administrator.newsletters.edit')->with('newsletter', $newsletter);
    }

    public function update(Request $request, $id)
    {
        $newsletter = Newsletter::firstWhere('id', $id);
        $newsletter->title = $request->title;
        $newsletter->pdf = $request->pdf;
        $saved = $newsletter->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah newsletter');

        if($saved) return redirect()->route('newsletters.index')->with(['message' => 'Mengubah newsletter berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah newsletter gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::firstWhere('id', $id);
        $delete = $newsletter->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus newsletter');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus newsletter berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus newsletter gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
