<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Logs;
use App\Models\StockPrice;

class StockPrices extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stock_prices = StockPrice::all();
        return view('administrator.stock_prices.list')->with('stock_prices', $stock_prices);
    }

    public function create()
    {
        return view('administrator.stock_prices.add');
    }

    public function store(Request $request)
    {
        $stock_price = new StockPrice;
        $stock_price->value = $request->value;
        $stock_price->year = $request->year;
        $stock_price->month = $request->month;
        $stock_price->day = $request->day;
        $saved = $stock_price->save();

        // Make log
        Logs::add(Auth::user()->name.' Menambahkan stock price baru');

        if($saved) return redirect()->route('stock-prices.index')->with(['message' => 'Menambah stock price berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menambah stock price gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function show($id)
    {}

    public function edit($id)
    {
        $stock_price = StockPrice::firstWhere('id', $id);
        return view('administrator.stock_prices.edit')->with('stock_price', $stock_price);
    }

    public function update(Request $request, $id)
    {
        $stock_price = StockPrice::firstWhere('id', $id);
        $stock_price->value = $request->value;
        $stock_price->year = $request->year;
        $stock_price->month = $request->month;
        $stock_price->day = $request->day;
        $saved = $stock_price->save();

        // Make log
        Logs::add(Auth::user()->name.' Mengubah stock price');

        if($saved) return redirect()->route('stock-prices.index')->with(['message' => 'Mengubah stock price berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Mengubah stock price gagal, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function destroy($id)
    {
        $stock_price = StockPrice::firstWhere('id', $id);
        $delete = $stock_price->delete();

        // Make log
        Logs::add(Auth::user()->name.' Menghapus stock price');

        if($delete) return redirect()->back()->with(['message' => 'Menghapus stock price berhasil!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Menghapus stock price gagal, Coba lagi nanti!', 'type' => 'danger']);
    }
}
