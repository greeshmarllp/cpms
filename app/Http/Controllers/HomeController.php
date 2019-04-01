<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminFaq;
use App\AdminContact;
use App\AdminRentalsGallery;
use App\AdminGallery;
use App\AdminBanner;
use App\AdminRentalsFaq;
use App\AdminFaqBanner;
use App\AdminContactBanner;
use App\AdminAbout;
use App\AdminTestimonial;
use App\AdminRentals;
use App\ImageUpload;
use App\AdminPropertyTypes;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('home');
  }

  public function banner()
  {
    $banner_data = new AdminBanner();
    $data=$banner_data->get_all();
    return view('admin/banner/banner-list',compact('data'));
  }

  public function add_banner()
  {

    $id = request()->segment(3);
    if($id =='tocken'){


      return view('admin/banner/add-banner');
    }else{

      $banner_data = new AdminBanner();
      $data=$banner_data->get_all($id);
      return view('admin/banner/add-banner',compact('data'));
    }
  }

  public function faq()
  {
    $faq_data = new AdminFaq();
    $data=$faq_data->get_all();
    return view('admin/faq/faq_list',compact('data'));
  }


  public function contact()
  {
    $about_data = new AdminContact();
    $data=$about_data->get_all();
    return view('admin/contact/contact-us',compact('data'));
  }


  public function gallery(){

    $gallery_data = new AdminGallery();
    $data=$gallery_data->get_all();
    return view('admin/gallery/gallery-list',compact('data'));
  }


  public function testimonials()
  {
    $testimonial_data = new AdminTestimonial();
    $data=$testimonial_data->get_all();
    return view('admin/testimonial/testimonial-list',compact('data'));
  }

  public function rentals_faq()
  {
    $renatlsfaq_data = new AdminRentalsFaq();
    $data=$renatlsfaq_data->get_all();
    return view('admin/rentalsfaq/rentalsfaq_list',compact('data'));
  }
  public function faq_banner()
  {
    $banner_data = new AdminFaqBanner();
    $data=$banner_data->get_all();
    return view('admin/faqbanner/faqbanner_list',compact('data'));
  }
  public function contact_banner()
  {
    $banner_data = new AdminContactBanner();
    $data=$banner_data->get_all();
    return view('admin/contactbanner/contactbanner_list',compact('data'));
  }

  public function about()
  {
    $about_data = new AdminAbout();
    $data=$about_data->get_all();
    return view('admin/about/about_list',compact('data'));
  }

  public function rentals()
  {
    $rental_data = new AdminRentals();
    $data=$rental_data->get_all();
    return view('admin/rentals/rentals_list',compact('data'));
  }

  
  public function rentals_gallery()
  {
    $rental_gallery_data = new AdminRentalsGallery();
    $data=$rental_gallery_data->get_all();
    return view('admin/rentalsgallery/rentalsgallery_list',compact('data'));
  }

   public function property_types()
  {
    $type_data = new AdminPropertyTypes();
    $data=$type_data->get_all();
    return view('admin/propertytypes/property_type_list',compact('data'));
  }
}
