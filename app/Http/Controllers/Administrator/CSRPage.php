<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class CSRPage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'csr');
        return view('administrator.csr_page')->with('data', $data);
    }

    public function store(Request $request)
    {
        $value['description_en'] = $request->description_en;
        $value['description_id'] = $request->description_id;

        $option = new Option;
        $option->key = 'csr';
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah corporate social responsibility');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah corporate social responsibility berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah corporate social responsibility gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $value['description_en'] = $request->description_en;
        $value['description_id'] = $request->description_id;

        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah corporate social responsibility');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah corporate social responsibility berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah corporate social responsibility gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
