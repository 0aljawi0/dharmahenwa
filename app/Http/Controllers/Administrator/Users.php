<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLog;

class Users extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('administrator.users.list')->with('users', $users);
    }

    public function create()
    {
        return view('administrator.users.add');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
