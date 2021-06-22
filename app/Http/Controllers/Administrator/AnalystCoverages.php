<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\AnalystCoverage;

class AnalystCoverages extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $analyst_coverages = AnalystCoverage::all();
        return view('administrator.analyst_coverages.list')->with('analyst_coverages', $analyst_coverages);
    }

    public function create()
    {
        return view('administrator.analyst_coverages.add');
    }

    public function store(Request $request)
    {
        $analyst_coverage = new AnalystCoverage;
        $analyst_coverage->firm = $request->firm;
        $analyst_coverage->analyst = $request->analyst;
        $analyst_coverage->pdf = $request->pdf;
        $saved = $analyst_coverage->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan analyst coverage baru');

        if($saved) return redirect()->route('analyst-coverages.index')->with(['message' => 'Menambah analyst coverage berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah analyst coverage gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(AnalystCoverage $analyst_coverage)
    {}

    public function edit(AnalystCoverage $analyst_coverage)
    {
        // $analyst_coverage = AnalystCoverage::firstWhere('id', $id);
        return view('administrator.analyst_coverages.edit')->with('analyst_coverage', $analyst_coverage);
    }

    public function update(Request $request, AnalystCoverage $analyst_coverage)
    {
        // $analyst_coverage = AnalystCoverage::firstWhere('id', $id);
        $analyst_coverage->firm = $request->firm;
        $analyst_coverage->analyst = $request->analyst;
        $analyst_coverage->pdf = $request->pdf;
        $saved = $analyst_coverage->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah annual report');

        if($saved) return redirect()->route('analyst-coverages.index')->with(['message' => 'Mengubah annual report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah annual report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(AnalystCoverage $analyst_coverage)
    {
        // $analyst_coverage = AnalystCoverage::firstWhere('id', $id);
        $delete = $analyst_coverage->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus annual report');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus annual report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus annual report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
