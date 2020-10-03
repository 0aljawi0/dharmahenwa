<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\Option;

class Address extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Option::firstWhere('key', 'address');
        return view('administrator.address')->with('data', $data);
    }

    public function store(Request $request)
    {
        $value['head_office'] = $request->head_office;

        $value['operational_title_1'] = $request->operational_title_1;
        $value['operational_address_1'] = $request->operational_address_1;

        $value['operational_title_2'] = $request->operational_title_2;
        $value['operational_address_2'] = $request->operational_address_2;

        $value['operational_title_3'] = $request->operational_title_3;
        $value['operational_address_3'] = $request->operational_address_3;

        $value['operational_title_4'] = $request->operational_title_4;
        $value['operational_address_4'] = $request->operational_address_4;

        $option = new Option;
        $option->key = 'address';
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah address');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah address berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah address gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function update(Request $request, $key)
    {
        $value['head_office'] = $request->head_office;

        $value['operational_title_1'] = $request->operational_title_1;
        $value['operational_address_1'] = $request->operational_address_1;

        $value['operational_title_2'] = $request->operational_title_2;
        $value['operational_address_2'] = $request->operational_address_2;

        $value['operational_title_3'] = $request->operational_title_3;
        $value['operational_address_3'] = $request->operational_address_3;

        $value['operational_title_4'] = $request->operational_title_4;
        $value['operational_address_4'] = $request->operational_address_4;

        $option = Option::firstWhere('key', $key);
        $option->value = json_encode($value);
        $saved = $option->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah address');

        if($saved) return redirect()->back()->with(['message' => 'Mengubah address berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah address gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
