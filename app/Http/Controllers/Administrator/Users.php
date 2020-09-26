<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\Logs;

class Users extends Controller
{

    use Logs;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $saved = $user->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan user baru');

        if($saved) return redirect()->route('users.index')->with(['message' => 'Menambah user berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah user gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::firstWhere('id', $id);
        return view('administrator.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::firstWhere('id', $id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $validator = $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);

            $user->password = Hash::make($request->password);
        }

        $saved = $user->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah user '.$user->email);

        if($saved) return redirect()->route('users.index')->with(['message' => 'Mengubah user berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah user gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $user = User::firstWhere('id', $id);

        // Make log
        Logs::add(Auth::user()->name.' Menghapus user '.$user->email);

        $delete = $user->delete();

        if($delete) return redirect()->back()->with(['message' => 'Menghapus user berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus user gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
