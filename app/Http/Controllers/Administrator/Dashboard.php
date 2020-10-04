<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Message;
use App\Models\ViolationReport;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['messages'] = Message::all();
        $data['violations'] = ViolationReport::paginate(2);

        return view('administrator.dashboard')->with($data);
    }

    public function message_destroy($id)
    {
        $message = Message::firstWhere('id', $id);
        $delete = $message->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus message');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus message berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus message gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function violation_destroy($id)
    {
        $violation_report = ViolationReport::firstWhere('id', $id);
        $delete = $violation_report->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus violation');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus violation berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus violation gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
