<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Slider;

class Sliders extends Controller
{
    use Logs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('administrator.sliders.list')->with('sliders', $sliders);
    }

    public function create()
    {
        return view('administrator.sliders.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $subtitle['en'] = $request->subtitle_english;
        $subtitle['id'] = $request->subtitle_indonesia;

        $slider = new Slider;
        $slider->image = $request->image;
        $slider->title = json_encode($title);
        $slider->subtitle = json_encode($subtitle);
        $slider->link = $request->link;
        $saved = $slider->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan slider baru');

        if($saved) return redirect()->route('sliders.index')->with(['message' => 'Menambah slider berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah slider gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $slider = Slider::firstWhere('id', $id);
        return view('administrator.sliders.edit')->with('slider', $slider);
    }

    public function update(Request $request, $id)
    {
        $title['en'] = $request->title_english;
        $title['id'] = $request->title_indonesia;

        $subtitle['en'] = $request->subtitle_english;
        $subtitle['id'] = $request->subtitle_indonesia;

        $slider = Slider::firstWhere('id', $id);
        $slider->image = $request->image;
        $slider->title = json_encode($title);
        $slider->subtitle = json_encode($subtitle);
        $slider->link = $request->link;
        $saved = $slider->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah slider');

        if($saved) return redirect()->route('sliders.index')->with(['message' => 'Mengubah slider berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah slider gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $slider = Slider::firstWhere('id', $id);
        $delete = $slider->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus slider');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus slider berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus slider gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

}
