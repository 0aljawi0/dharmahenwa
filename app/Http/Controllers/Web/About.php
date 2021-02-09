<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Milestone;
use App\Models\Executive;
use App\Models\Award;

class About extends Controller
{
    public function company_profile()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['company_profile'] = Option::firstWhere('key', 'company-profile');

        return view('web.company_profile')->with($data);
    }

    public function mvv()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['mvv'] = Option::firstWhere('key', 'mvv');

        return view('web.mvv')->with($data);
    }

    public function milestone()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        // $data['milestones'] = Milestone::orderBy('year', 'asc')->get();
        $milestones = Milestone::orderBy('year', 'asc')->get();

        $year_temp = 0;
        $newMS = [];

        foreach ($milestones as $key => $value) {
            if ($value->year == $year_temp) {
                $newMS[$year_temp][] = $milestones[$key];
            } else {
                $newMS[$value->year][] = $milestones[$key];
            }

            $year_temp = $value->year;
        }

        $data['milestones'] = $newMS;

        return view('web.milestone')->with($data);
    }

    public function commissioners()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['commissioners'] = Executive::where('board', 'Commissioners')->get();

        return view('web.commisioners')->with($data);
    }

    public function directors()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['directors'] = Executive::where('board', 'Directors')->get();

        return view('web.directors')->with($data);
    }

    public function management()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['management'] = Executive::where('board', 'Management')->get();

        return view('web.management')->with($data);
    }

    public function awards()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');

        $data['awards'] = Award::where('type', 'Awards')->latest()->get();

        $year = Award::where('type', 'Awards')->pluck('year')->toArray();
        rsort($year);
        $data['year'] = array_unique($year);

        return view('web.awards')->with($data);
    }

    public function certification()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');

        $data['certification'] = Award::where('type', 'Certification')->latest()->get();

        $year = Award::where('type', 'Certification')->pluck('year')->toArray();
        rsort($year);
        $data['year'] = array_unique($year);

        return view('web.certification')->with($data);
    }
}
