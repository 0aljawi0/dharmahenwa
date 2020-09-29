<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Milestone;

class About extends Controller
{
    public function company_profile()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['company_profile'] = Option::firstWhere('key', 'company-profile');

        return view('web.company_profile')->with($data);
    }

    public function mvv()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['mvv'] = Option::firstWhere('key', 'mvv');

        return view('web.mvv')->with($data);
    }

    public function milestone()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['milestones'] = Milestone::orderBy('year', 'asc')->get();

        return view('web.milestone')->with($data);
    }
}
