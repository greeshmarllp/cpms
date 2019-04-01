<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminAbout;
// use App\ImageUpload;




class AboutController extends Controller
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

    
    public function add_new_about()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/about/add-about');
      }
      else{
        $about_data = new AdminAbout();
        $data=$about_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/about/add-about',compact('data'));
      }
      
    }

    public function save_about(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/about/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);

            $About_model = new AdminAbout();
            $About_model->save_about($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
         $About_model = new AdminAbout();
         $About_model->save_about($form_data); 

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
          $image->move(public_path().'/images/about/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);
          
          $About_model = new AdminAbout();
          $About_model->save_about($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
        $About_model = new AdminAbout();
        $About_model->save_about($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteTestimonial(Request $request){

      $id = $request->input('id');
      
      $Testimonial_del = new AdminAbout();
      $Testimonial_del->delete_about($id);
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
