<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViolationReport;

class ViolationReports extends Controller
{
    public function store(Request $request)
    {

        $evidence[] = $request->evidence_0;
        $evidence[] = $request->evidence_1;
        $evidence[] = $request->evidence_2;

        $violation = new ViolationReport;
        $violation->name = $request->name;
        $violation->email = $request->email;
        $violation->phone = $request->phone;
        $violation->category_violation = $request->category_violation;
        $violation->party_reported = $request->party_reported;
        $violation->violation_detail = $request->violation_detail;
        $violation->evidence = json_encode($evidence);
        $saved = $violation->save();

        if($saved) return redirect()->back()->with(['message' => 'Berhasil mengirim laporan', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Gagal mengirim laporan, Coba lagi nanti!', 'type' => 'danger']);
    }
}
