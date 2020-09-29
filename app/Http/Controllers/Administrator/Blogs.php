<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Blog;

class Blogs extends Controller
{
    use Logs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('administrator.blogs.list')->with('blogs', $blogs);
    }

    public function create()
    {
        return view('administrator.blogs.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $description['en'] = $request->description_english;
        $description['id'] = $request->description_indonesia;

        $blog = new Blog;
        $blog->title = json_encode($title);
        $blog->description = json_encode($description);
        $blog->image = $request->image;
        $blog->author = Auth::user()->name;
        $saved = $blog->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan blog baru');

        if($saved) return redirect()->route('blogs.index')->with(['message' => 'Menambah blog berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah blog gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $blog = Blog::firstWhere('id', $id);
        return view('administrator.blogs.edit')->with('blog', $blog);
    }

    public function update(Request $request, $id)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $description['en'] = $request->description_english;
        $description['id'] = $request->description_indonesia;

        $blog = Blog::firstWhere('id', $id);
        $blog->title = json_encode($title);
        $blog->description = json_encode($description);
        $blog->image = $request->image;
        $blog->author = Auth::user()->name;
        $saved = $blog->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah blog');

        if($saved) return redirect()->route('blogs.index')->with(['message' => 'Mengubah blog berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah blog gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $blog = Blog::firstWhere('id', $id);
        $delete = $blog->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus blog');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus blog berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus blog gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
