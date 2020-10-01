<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Coal;
use App\Models\Infrastructure;

class Business extends Controller
{
    public function coal()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['coals'] = Coal::all();

        return view('web.coals')->with($data);
    }

    public function infrastructure()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['infrastructures'] = Infrastructure::all();

        return view('web.infrastructures')->with($data);
    }

    public function port()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['port'] = Option::firstWhere('key', 'port');

        return view('web.port')->with($data);
    }

    public function operational()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['operational_area'] = Option::firstWhere('key', 'operational-area');

        return view('web.operational_area')->with($data);
    }

}
