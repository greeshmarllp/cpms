<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\FrontModel;
use App\ImageUpload;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('index');
    }
    public function about()
    {
        $about_data = new FrontModel();
        $about_list=$about_data->get_about_data();

        return view('about',compact('about_list'));
    }


    public function terms_of_use()
    {

        return view('terms_of_use');
    }

    public function team()
    {

        return view('team');
    }

    
    public function testimonials()
    {

        return view('testimonials');
    }
    
    public function rentals()
    {
        $rentals_data = new FrontModel();
       $rentals_list=$rentals_data->get_rentals_data();
       // print_r($rentals_list);
       // exit();
       return view('rentals',compact('rentals_list'));
   }

   public function sales()
   {

    return view('sales');
}


public function faq()
{

    $property_faq_data = new FrontModel();
    $property_faq_list=$property_faq_data->get_property_faq_data();

    $tenancy_faq_data = new FrontModel();
    $tenancy_faq_list=$tenancy_faq_data->get_tenancy_faq_data();

    $agreement_faq_data = new FrontModel();
    $agreement_faq_list=$agreement_faq_data->get_agreement_faq_data();

    $rentals_faq_data = new FrontModel();
    $rentals_faq_list=$rentals_faq_data->get_rentals_faq_data();
// print_r($property_faq_list);
// exit();
    return view('faq',compact('property_faq_list','tenancy_faq_list','agreement_faq_list','rentals_faq_list'));
}

public function contact_us()
{

    return view('contact_us');
}
}
