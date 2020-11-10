<?php
namespace App\Helpers;

class Month
{
    public static function lang(string $month)
    {
        switch ($month) {
            case 'Januari':
                $m = session()->get('locale') == 'id' ? 'Januari' : 'January';
                break;
            case 'Februari':
                $m = session()->get('locale') == 'id' ? 'Februari' : 'February';
                break;
            case 'Maret':
                $m = session()->get('locale') == 'id' ? 'Maret' : 'March';
                break;
            case 'April':
                $m = session()->get('locale') == 'id' ? 'April' : 'April';
                break;
            case 'Mei':
                $m = session()->get('locale') == 'id' ? 'Mei' : 'May';
                break;
            case 'Juni':
                $m = session()->get('locale') == 'id' ? 'Juni' : 'June';
                break;
            case 'Juli':
                $m = session()->get('locale') == 'id' ? 'Juli' : 'July';
                break;
            case 'Agustus':
                $m = session()->get('locale') == 'id' ? 'Agustus' : 'August';
                break;
            case 'September':
                $m = session()->get('locale') == 'id' ? 'September' : 'September';
                break;
            case 'Oktober':
                $m = session()->get('locale') == 'id' ? 'Oktober' : 'October';
                break;
            case 'November':
                $m = session()->get('locale') == 'id' ? 'November' : 'November';
                break;
            case 'Desember':
                $m = session()->get('locale') == 'id' ? 'Desember' : 'December';
                break;
        }

        return $m;
    }
}
