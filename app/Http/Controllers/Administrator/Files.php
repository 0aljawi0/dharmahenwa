<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\Logs;
use App\Models\File;

class Files extends Controller
{

    use Logs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = File::where('type', 'image')->orderBy('created_at', 'desc')->get();
        $document = File::where('type', 'document')->orderBy('created_at', 'desc')->get();

        $files['images'] = $images;
        $files['document'] = $document;

        return view('administrator.files')->with('files', $files);
    }

    public function all()
    {
        $images = File::where('type', 'image')->orderBy('created_at', 'desc')->get();
        $document = File::where('type', 'document')->orderBy('created_at', 'desc')->get();

        $files['images'] = $images;
        $files['document'] = $document;

        return response()->json($files);
    }

    public function store(Request $request)
    {
        $directory = $request->type.'_'.date('Y_m');
        $name = date('dHis').'.';
        $extension = $request->file->getClientOriginalExtension();

        $filename = $name.$extension;
        $store = $request->file->storeAs('public/'.$directory, $filename);

        if ($store) $fileurl = $directory.'/'.$filename;

        $file = new File;
        $file->name = $request->name;
        $file->type = $request->type;
        $file->path = $fileurl;
        $saved = $file->save();

        Logs::add(Auth::user()->name.' Menambahkan '.$request->type);

        if($saved) return response()->json(['status' => 'ok']);
        else return response()->json(['status' => 'fail']);
    }

    public function destroy($id)
    {
        $file = File::firstWhere('id', $id);

        Storage::delete('public/'.$file->path);
        Logs::add(Auth::user()->name.' Menghapus '.$file->type);

        $delete = $file->delete();

        if($delete) return redirect()->back()->with(['message' => 'Menghapus file berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus file gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
