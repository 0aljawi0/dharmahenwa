<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Sustainability;
use App\Models\CSR;
use App\Models\CSRGallery;

class WebSustainability extends Controller
{
    public function sustainability_report()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['sustainabilities'] = Sustainability::all();

        return view('web.sustainabilities')->with($data);
    }

    public function hse()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['hse'] = Option::firstWhere('key', 'hse');

        return view('web.hse')->with($data);
    }

    public function web_csr()
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['csr'] = CSR::all();
        $data['csr_page'] = Option::firstWhere('key', 'csr');
        $data['csr_galleries'] = CSRGallery::all();

        return view('web.csr')->with($data);
    }

    public function web_csr_detail($id, $title)
    {
        $data['website'] = Option::firstWhere('key', 'website-profile');
        $data['address'] = Option::firstWhere('key', 'address');
        $data['csr_detail'] = CSR::firstWhere('id', $id);

        return view('web.csr_detail')->with($data);
    }
}
