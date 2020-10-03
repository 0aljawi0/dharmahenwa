<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Policy;
use App\Models\Committee;

class CorporateGovernance extends Controller
{
    public function gcg()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['gcg'] = Option::firstWhere('key', 'gcg');

        return view('web.gcg')->with($data);
    }

    public function ethics()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['ethics'] = Option::firstWhere('key', 'business-ethics');

        return view('web.ethics')->with($data);
    }

    public function coc()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['coc'] = Option::firstWhere('key', 'code-of-conduct');

        return view('web.coc')->with($data);
    }

    public function integrity()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['integrity'] = Option::firstWhere('key', 'integrity-pact');

        return view('web.integrity')->with($data);
    }

    public function policy()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['policy'] = Policy::all();

        return view('web.policy')->with($data);
    }

    public function whistleblowing()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['whistleblowing'] = Option::firstWhere('key', 'whistleblowing');

        return view('web.whistleblowing')->with($data);
    }

    public function audit()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['audit'] = Committee::where('type', 'Audit')->get();

        return view('web.audit')->with($data);
    }

    public function nomination()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['nomination'] = Committee::where('type', 'Nomination & Remuneration')->get();

        return view('web.nomination')->with($data);
    }

    public function risk()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['risk'] = Committee::where('type', 'Risk Management')->get();

        return view('web.risk')->with($data);
    }
}
