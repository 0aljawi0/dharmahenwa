<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViolationReport;

class ViolationReports extends Controller
{
    public function store(Request $request)
    {
        $evidence[] = $this->upload_evidence($request->evidence_0, 'evidence_0');
        $evidence[] = $this->upload_evidence($request->evidence_1, 'evicence_1');
        $evidence[] = $this->upload_evidence($request->evidence_2, 'evidence_2');

        $violation = new ViolationReport;
        $violation->name = $request->name;
        $violation->email = $request->email;
        $violation->phone = $request->phone;
        $violation->category_violation = $request->category_violation;
        $violation->party_reported = $request->party_reported;
        $violation->violation_detail = $request->violation_detail;
        $violation->evidence = json_encode($evidence);
        $violation->is_read = 'No';
        $saved = $violation->save();

        if($saved) return redirect()->back()->with(['message' => 'Berhasil mengirim laporan', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Gagal mengirim laporan, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function upload_evidence ($image, $name) {
        $directory = 'evidence'.'_'.date('Y_m');
        $name = $name.date('dHis').'.';
        $extension = $image->getClientOriginalExtension();

        $filename = $name.$extension;
        $store = $image->storeAs('public/'.$directory, $filename);

        if ($store) return $directory.'/'.$filename;
    }
}
