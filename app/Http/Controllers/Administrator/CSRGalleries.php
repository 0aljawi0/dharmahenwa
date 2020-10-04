<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\CSRGallery;

class CSRGalleries extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $csr_galleries = CSRGallery::all();
        return view('administrator.csr_galleries.list')->with('csr_galleries', $csr_galleries);
    }

    public function create()
    {
        return view('administrator.csr_galleries.add');
    }

    public function store(Request $request)
    {
        $csr_gallery = new CSRGallery;
        $csr_gallery->image = $request->image;
        $saved = $csr_gallery->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan csr gallery baru');

        if($saved) return redirect()->route('csr-galleries.index')->with(['message' => 'Menambah csr gallery berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah csr gallery gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $csr_gallery = CSRGallery::firstWhere('id', $id);
        return view('administrator.csr_galleries.edit')->with('csr_gallery', $csr_gallery);
    }

    public function update(Request $request, $id)
    {
        $csr_gallery = CSRGallery::firstWhere('id', $id);
        $csr_gallery->image = $request->image;
        $saved = $csr_gallery->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah csr gallery');

        if($saved) return redirect()->route('csr-galleries.index')->with(['message' => 'Mengubah csr gallery berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah csr gallery gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $csr_gallery = CSRGallery::firstWhere('id', $id);
        $delete = $csr_gallery->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus csr gallery');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus csr gallery berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus csr gallery gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}