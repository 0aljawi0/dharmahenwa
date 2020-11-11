<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\FinancialReport;

class FinancialReports extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $financial_reports = FinancialReport::all();
        return view('administrator.financial_reports.list')->with('financial_reports', $financial_reports);
    }

    public function create()
    {
        return view('administrator.financial_reports.add');
    }

    public function store(Request $request)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $financial_report = new FinancialReport;
        $financial_report->title = json_encode($title);
        $financial_report->pdf = $request->pdf;
        $saved = $financial_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan financial report baru');

        if($saved) return redirect()->route('financial-reports.index')->with(['message' => 'Menambah financial report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah financial report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $financial_report = FinancialReport::firstWhere('id', $id);
        return view('administrator.financial_reports.edit')->with('financial_report', $financial_report);
    }

    public function update(Request $request, $id)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $financial_report = FinancialReport::firstWhere('id', $id);
        $financial_report->title = json_encode($title);
        $financial_report->pdf = $request->pdf;
        $saved = $financial_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah financial report');

        if($saved) return redirect()->route('financial-reports.index')->with(['message' => 'Mengubah financial report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah financial report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $financial_report = FinancialReport::firstWhere('id', $id);
        $delete = $financial_report->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus financial report');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus financial report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus financial report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
