<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Policy;

class Policies extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $policies = Policy::all();
        return view('administrator.policies.list')->with('policies', $policies);
    }

    public function create()
    {
        return view('administrator.policies.add');
    }

    public function store(Request $request)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $description['en'] = $request->description_en;
        $description['id'] = $request->description_id;

        $policy = new Policy;
        $policy->title = json_encode($title);
        $policy->description = json_encode($description);
        $policy->pdf = $request->pdf;
        $saved = $policy->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan policy baru');

        if($saved) return redirect()->route('policies.index')->with(['message' => 'Menambah policy berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah policy gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(Policy $policy)
    {}

    public function edit(Policy $policy)
    {
        // $policy = Policy::firstWhere('id', $id);
        return view('administrator.policies.edit')->with('policy', $policy);
    }

    public function update(Request $request, Policy $policy)
    {
        $title['en'] = $request->title_en;
        $title['id'] = $request->title_id;

        $description['en'] = $request->description_en;
        $description['id'] = $request->description_id;

        // $policy = Policy::firstWhere('id', $id);
        $policy->title = json_encode($title);
        $policy->description = json_encode($description);
        $policy->pdf = $request->pdf;
        $saved = $policy->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah policy');

        if($saved) return redirect()->route('policies.index')->with(['message' => 'Mengubah policy berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah policy gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(Policy $policy)
    {
        // $policy = Policy::firstWhere('id', $id);
        $delete = $policy->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus policy');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus policy berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus policy gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
