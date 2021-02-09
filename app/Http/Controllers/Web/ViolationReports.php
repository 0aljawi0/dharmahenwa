<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\Pelaporan;
use Illuminate\Http\Request;
use App\Models\ViolationReport;
use Illuminate\Support\Facades\Mail;

class ViolationReports extends Controller
{
    public function store(Request $request)
    {
        $evidence[] = $this->upload_evidence($request->evidence_0, 'evidence_0');
        $evidence[] = $this->upload_evidence($request->evidence_1, 'evicence_1');
        $evidence[] = $this->upload_evidence($request->evidence_2, 'evidence_2');

        $request->merge([
            'evidence' => json_encode($evidence),
            'is_read' => 'No'
        ]);

        $violation = ViolationReport::create($request->all())->id;

        Mail::to(env('MAIL_FOR_WHISTLEBLOWING'))->send(new Pelaporan($violation));

        if($violation) return redirect()->back()->with(['message' => 'Berhasil mengirim laporan', 'type' => 'success']);
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
