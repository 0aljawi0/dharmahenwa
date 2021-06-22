<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\AnnualReport;

class AnnualReports extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $annual_reports = AnnualReport::all();
        return view('administrator.annual_reports.list')->with('annual_reports', $annual_reports);
    }

    public function create()
    {
        return view('administrator.annual_reports.add');
    }

    public function store(Request $request)
    {
        $annual_report = new AnnualReport;
        $annual_report->title = $request->title;
        $annual_report->image = $request->image;
        $annual_report->pdf = $request->pdf;
        $saved = $annual_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan annual report baru');

        if($saved) return redirect()->route('annual-reports.index')->with(['message' => 'Menambah annual report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah annual report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show(AnnualReport $annual_report)
    {}

    public function edit(AnnualReport $annual_report)
    {
        // $annual_report = AnnualReport::firstWhere('id', $id);
        return view('administrator.annual_reports.edit')->with('annual_report', $annual_report);
    }

    public function update(Request $request, AnnualReport $annual_report)
    {
        // $annual_report = AnnualReport::firstWhere('id', $id);
        $annual_report->title = $request->title;
        $annual_report->image = $request->image;
        $annual_report->pdf = $request->pdf;
        $saved = $annual_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah annual report');

        if($saved) return redirect()->route('annual-reports.index')->with(['message' => 'Mengubah annual report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah annual report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy(AnnualReport $annual_report)
    {
        // $annual_report = AnnualReport::firstWhere('id', $id);
        $delete = $annual_report->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus annual report');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus annual report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus annual report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
