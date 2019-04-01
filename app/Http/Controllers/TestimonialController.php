<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminTestimonial;
// use App\ImageUpload;




class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    
    public function add_new_testimonial()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/testimonial/add-testimonial');
      }
      else{
        $testimonial_data = new AdminTestimonial();
        $data=$testimonial_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/testimonial/add-testimonial',compact('data'));
      }
      
    }

    public function save_testimonial(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/testimonial/', $name);  
            $data[] = $name;  
            $form_data = array('description'=>$request->input('description'),'image'=>$name);

            $Testimonial_model = new AdminTestimonial();
            $Testimonial_model->save_testimonial($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('description'=>$request->input('description'));
         $Testimonial_model = new AdminTestimonial();
         $Testimonial_model->save_testimonial($form_data); 

       }
     }
// end adding
// editing start
     else{
      if($request->hasfile('filename'))
      {


        foreach($request->file('filename') as $image)
        {

          $name=$image->getClientOriginalName();
          $image->move(public_path().'/images/testimonial/', $name);  
          $data[] = $name;  
          $form_data = array('description'=>$request->input('description'),'image'=>$name);
          
          $Testimonial_model = new AdminTestimonial();
          $Testimonial_model->save_testimonial($form_data,$id); 
        }

      } 
      else{
        $form_data = array('description'=>$request->input('description'));
        $Testimonial_model = new AdminTestimonial();
        $Testimonial_model->save_testimonial($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteTestimonial(Request $request){

      $id = $request->input('id');
      
      $Testimonial_del = new AdminTestimonial();
      $Testimonial_del->delete_testimonial($id);
      if ($Testimonial_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
