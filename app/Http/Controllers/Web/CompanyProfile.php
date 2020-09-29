<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class CompanyProfile extends Controller
{
    public function index()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['company_profile'] = Option::firstWhere('key', 'company-profile');

        return view('web.company_profile')->with($data);
    }
}
