<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Redirector;
    use App\AdminAboutBanner;
    use App\ImageUpload;

    class AboutBannerController extends Controller{

        public function __construct(){

            $this->middleware('auth');
        }

        public function aboutbanner(){

            $id = request()->segment(3);
            if($id =='tocken'){

                return view('admin/aboutbanner/add-aboutbanner');
            }else{

                $aboutbanner_data = new AdminAboutBanner();
                $data=$aboutbanner_data->get_all($id);
                return view('admin/aboutbanner/add-aboutbanner',compact('data'));
            }
        }

        public function save(Request $request){

            $id = request()->segment(3);
            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/aboutbanner/', $name);  
                    $data[] = $name;  
                    $form_data = array('heading'=>$request->input('heading'),'image' =>$name); 
                }
            }else{

                $form_data = array('heading'=>$request->input('heading'),'image' =>$name); 
            }

            $aboutbanner_data = new AdminAboutBanner();
            $data=$aboutbanner_data->test($form_data,$id);
            return Redirect::to('admin/aboutbanner');
        }
    }