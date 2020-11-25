<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\AnalystCoverage;
use App\Models\AnnualReport;
use App\Models\Blog;
use App\Models\FinancialReport;
use App\Models\Meeting;
use App\Models\MonthlyReport;
use App\Models\Newsletter;
use App\Models\Shareholder;
use App\Models\Presentation;

class CorporateSecretary extends Controller
{
    public function profile()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['profile'] = Option::firstWhere('key', 'profile');

        return view('web.profile')->with($data);
    }

    public function shareholder()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['shareholders'] = Shareholder::all();

        $data['name'] = Shareholder::pluck('name')->toArray();
        $share = Shareholder::pluck('share')->toArray();

        foreach ($share as $item) {
            $new[] = str_replace('.', '', $item);
        }

        $data['share'] = $new;

        $data['percent'] = Shareholder::pluck('percent')->toArray();

        return view('web.shareholder')->with($data);
    }

    public function meeting()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['meetings'] = Meeting::simplePaginate(5);

        return view('web.meeting')->with($data);
    }

    public function presentation()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['presentations'] = Presentation::all();

        return view('web.presentation')->with($data);
    }

    public function annual_report()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['annual_reports'] = AnnualReport::latest()->get();

        return view('web.annual_report')->with($data);
    }

    public function financial()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['financials'] = FinancialReport::latest()->paginate(12);

        // $year = FinancialReport::pluck('year')->toArray();
        // rsort($year);
        // $data['year'] = array_unique($year);

        return view('web.financial')->with($data);
    }

    public function newsletter()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['newsletters'] = Newsletter::latest()->paginate(12);

        return view('web.newsletter')->with($data);
    }

    public function monthly_report()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['monthly_reports'] = MonthlyReport::latest()->paginate(12);

        // $year = MonthlyReport::pluck('year')->toArray();
        // rsort($year);
        // $data['year'] = array_unique($year);

        return view('web.monthly_report')->with($data);
    }

    public function analyst_coverage()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['analyst_coverages'] = AnalystCoverage::all();

        return view('web.analyst_coverage')->with($data);
    }

    public function press_release()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['blogs'] = Blog::latest()->simplePaginate(6);

        return view('web.press_release')->with($data);
    }

    public function press_release_detail($id, $title)
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['blog'] = Blog::firstWhere('id', $id);

        return view('web.press_release_detail')->with($data);
    }
}
