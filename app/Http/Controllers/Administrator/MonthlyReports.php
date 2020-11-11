<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\MonthlyReport;

class MonthlyReports extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $monthly_reports = MonthlyReport::all();
        return view('administrator.monthly_reports.list')->with('monthly_reports', $monthly_reports);
    }

    public function create()
    {
        return view('administrator.monthly_reports.add');
    }

    public function store(Request $request)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $monthly_report = new MonthlyReport;
        $monthly_report->title = json_encode($title);
        $monthly_report->pdf = $request->pdf;
        $saved = $monthly_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan monthly report baru');

        if($saved) return redirect()->route('monthly-reports.index')->with(['message' => 'Menambah monthly report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah monthly report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $monthly_report = MonthlyReport::firstWhere('id', $id);
        return view('administrator.monthly_reports.edit')->with('monthly_report', $monthly_report);
    }

    public function update(Request $request, $id)
    {
        $title['id'] = $request->title_id;
        $title['en'] = $request->title_en;

        $monthly_report = MonthlyReport::firstWhere('id', $id);
        $monthly_report->title = json_encode($title);
        $monthly_report->pdf = $request->pdf;
        $saved = $monthly_report->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah monthly report');

        if($saved) return redirect()->route('monthly-reports.index')->with(['message' => 'Mengubah monthly report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah monthly report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $monthly_report = MonthlyReport::firstWhere('id', $id);
        $delete = $monthly_report->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus monthly report');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus monthly report berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus monthly report gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
