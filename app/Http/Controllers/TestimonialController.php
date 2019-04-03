<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\ImageUpload;
use App\AdminTestimonial;

class TestimonialController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_testimonial(){

      $id = request()->segment(3);
      if($id =='tocken'){

        return view('admin/testimonial/add-testimonial');
      }else{

        $testimonial_data = new AdminTestimonial();
        $data=$testimonial_data->get_all($id);
        return view('admin/testimonial/add-testimonial',compact('data'));
      }
    }

    public function save(Request $request){

        $id = request()->segment(3);
        if($id =='tocken'){

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/testimonial/', $name);  
                    $data[] = $name;  
                    $form_data = array('name'=>$request->input('name'),'description'=>$request->input('editor1'),'position'=>$request->input('position'),'image' =>$name); 
                }
            }else{

                $form_data = array('name'=>$request->input('name'),'description'=>$request->input('editor1'),'position'=>$request->input('position'));
            }
        }else{

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/testimonial/', $name);  
                    $data[] = $name;  
                    $form_data = array('name'=>$request->input('name'),'description'=>$request->input('editor1'),'position'=>$request->input('position'),'image' =>$name); 
                }
            } else{

                $form_data = array('name'=>$request->input('name'),'description'=>$request->input('editor1'),'position'=>$request->input('position')); 
            } 
        }

        $testimonial_data = new AdminTestimonial(); 
        $testimonial_data->test($form_data,$id); 
        return Redirect::to('admin/testimonial');
    }

    public function Delete(Request $request){

        $id=$request->input('id');
        $testimonial_data = new AdminTestimonial();
        $result=$testimonial_data->delete($id);
        if ($result == TRUE) {

                $response['status']='success';
                $response['message']='Deleted Successfully';
            } else {

                $response['status']='error';
                $response['message']='invalid data!...';
            }
            echo json_encode($response);
    }
}

