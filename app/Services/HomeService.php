<?php
namespace App\Services;

use App\Models\ContactUs;
use App\Models\Developer;
use App\Models\Quotation;

class HomeService {

    public function getHomeStatics () {

        $data = [];

        $data['developer_count'] = Developer::count();

        $data['contact_us_count'] = ContactUs::count();

        $data['quotation_count'] = Quotation::count();


        // $data['last_developer'] = Developer::limit(3)->latest()->get();


        return $data;
    }
}
