<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Slider;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\MonthlyReport;
use App\Models\AnnualReport;
use App\Models\Sustainability;
use App\Models\FinancialReport;
use App\Models\Blog;
use App\Models\StockPrice;


class Home extends Controller
{
    public function index()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');

        $data['sliders'] = Slider::all();
        $data['home_section'] = Option::firstWhere('key', 'home-section');
        $data['newsletters'] = Newsletter::latest()->limit(3)->get();
        $data['monthly_reports'] = MonthlyReport::latest()->limit(3)->get();
        $data['financials'] = FinancialReport::latest()->limit(3)->get();

        // $year = FinancialReport::pluck('year')->toArray();
        // rsort($year);
        // $year = array_unique($year);
        // $year = array_slice($year, 0, 2);
        // $data['year'] = $year;

        $data['annual_reports'] = AnnualReport::latest()->limit(6)->get();
        $data['sustainabilities'] = Sustainability::latest()->limit(3)->get();
        $data['blogs'] = Blog::latest()->limit(3)->get();
        $data['stock_prices'] = StockPrice::all();


        return view('web.home')->with($data);
    }

    public function contact()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');

        return view('web.contact')->with($data);
    }

    public function career()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['career'] = Option::firstWhere('key', 'career');

        return view('web.career')->with($data);
    }

    public function procurement()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['procurement'] = Option::firstWhere('key', 'procurement');

        return view('web.procurement')->with($data);
    }

    public function message_store(Request $request)
    {
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $saved = $message->save();

        if($saved) return redirect()->back()->with(['message' => 'Berhasil mengirim pesan!', 'type' => 'success']);
        else return redirect()->back()->with(['message' => 'Gagal mengirim pesan, Coba lagi nanti!', 'type' => 'danger']);
    }

    public function search(Request $request)
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');

        $q = $request->q;

        $data['q'] = $q;
        $data['newsletters'] = Newsletter::where('title', 'like', '%'.$q.'%')->get();
        $data['annual_reports'] = AnnualReport::where('title', 'like', '%'.$q.'%')->get();
        $data['sustainabilities'] = Sustainability::where('title', 'like', '%'.$q.'%')->get();
        $data['blogs'] = Blog::where('title', 'like', '%'.$q.'%')->get();
        $data['monthly_reports'] = MonthlyReport::where('title', 'like', '%'.$q.'%')->get();
        $data['financials'] = FinancialReport::where('title', 'like', '%'.$q.'%')->get();

        return view('web.search')->with($data);
    }


}
