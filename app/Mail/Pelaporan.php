<?php

namespace App\Mail;

use App\Models\ViolationReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class Pelaporan extends Mailable
{
    use Queueable, SerializesModels;

    public $violation_id;

    public function __construct($violation_id)
    {
        $this->violation_id = $violation_id;
    }


    public function build()
    {
        $vr = ViolationReport::find($this->violation_id);
        $evidence = json_decode($vr->evidence);

        return $this->subject('Whistleblowing PT Darma Henwa Tbk')
                ->from(['address' => $vr->email, 'name' => $vr->name])
                ->attach(asset('storage/'.$evidence[0]))
                ->attach(asset('storage/'.$evidence[1]))
                ->attach(asset('storage/'.$evidence[2]))
                ->view('mail.pelaporan', ['data' => $vr]);
    }
}
