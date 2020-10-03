<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\CSR;

class CSRs extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $csr = CSR::all();
        return view('administrator.csr.list')->with('csr', $csr);
    }

    public function create()
    {
        return view('administrator.csr.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $description['en'] = $request->description_english;
        $description['id'] = $request->description_indonesia;

        $csr = new CSR;
        $csr->title = json_encode($title);
        $csr->description = json_encode($description);
        $csr->image = $request->image;
        $saved = $csr->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan csr baru');

        if($saved) return redirect()->route('csr.index')->with(['message' => 'Menambah csr berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah csr gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $csr = CSR::firstWhere('id', $id);
        return view('administrator.csr.edit')->with('csr', $csr);
    }

    public function update(Request $request, $id)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $description['en'] = $request->description_english;
        $description['id'] = $request->description_indonesia;

        $csr = CSR::firstWhere('id', $id);
        $csr->title = json_encode($title);
        $csr->description = json_encode($description);
        $csr->image = $request->image;
        $saved = $csr->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah csr');

        if($saved) return redirect()->route('csr.index')->with(['message' => 'Mengubah csr berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah csr gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $csr = CSR::firstWhere('id', $id);
        $delete = $csr->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus csr');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus csr berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus csr gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
