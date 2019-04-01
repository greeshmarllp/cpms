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
            $banner_data = new FrontModel();
            $banner_data=$banner_data->home_banner();

            $secondsection_data = new FrontModel();
            $section_data=$secondsection_data->second_section();

            $service_data = new FrontModel();
            $service_data=$service_data->home_service();

            $gallery_data = new FrontModel();
            $gallery_data=$gallery_data->gallery();

            $content_data=new FrontModel();
            $content_data=$content_data->content();

            $testimonial_data = new FrontModel();
            $testimonial_data=$testimonial_data->testimonial();
            // echo "<pre>";
            // print_r($testimonial_data);
            // exit();
            return view('welcome',compact('banner_data','section_data','service_data','gallery_data','content_data','testimonial_data'));
        }

         public function about()
        {
            $mission_data = new FrontModel();
            $mission_data=$mission_data->mission();

            $vission_data = new FrontModel();
            $vission_data=$vission_data->vission();

            $content_data = new FrontModel();
            $content_data=$content_data->aboutcontent();
            // echo "<pre>";
            // print_r($content_data);
            // exit();
            return view('about',compact('mission_data','vission_data','content_data'));
        }

        public function associates()
    {
        $associate_data = new FrontModel();
        $associate_list=$associate_data->get_associate_list();

        return view('associates',compact('associate_list'));
    }

    public function gallery()
    {
        $gallery_data = new FrontModel();
        $gallery_list=$gallery_data->get_gallery_list();

        return view('gallery',compact('gallery_list'));
    }

    public function contact_us()
    {
        $contact_data = new FrontModel();
        $contact_list=$contact_data->get_contact_list();

        return view('contact',compact('contact_list'));
    }

     public function catalogue()
    {

        $catalogue_data = new FrontModel();
        $firstlevel_list=$catalogue_data->get_catalogue_list();
        $id=request()->segment(2);
        $data=request()->segment(3);
        // print_r($id);
        // exit();
        if($id=='tocken'){
            $content_data = new FrontModel();
            $content_list=$content_data->get_content_list(); 
        }
        if($id=='firstlevel'){
            // print_r(1);
            // exit();
            $content_data = new FrontModel();
            $content_list=$content_data->get_content_firstlevel_list($data);
        // print_r($content_list);
        // exit();
        }
        if($id=='secondlevel'){
           $content_data = new FrontModel();
           $content_list=$content_data->get_content_secondlevel_list($data);
       }
        if($id=='thirdlevel'){
           $content_data = new FrontModel();
           $content_list=$content_data->get_content_thirdlevel_list($data);
       }
         if($id=='fourthlevel'){
           $content_data = new FrontModel();
           $content_list=$content_data->get_content_fourthlevel_list($data);
       }

        // echo "<pre>";
        // print_r($firstlevel_list);
        // exit();
       return view('catalogue',compact('firstlevel_list','content_list'));
   }

    }
