<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLog;

class UserLogs extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_logs = UserLog::all();
        return view('administrator.user_logs')->with('user_logs', $user_logs);
    }
}
