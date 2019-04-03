<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminRentalDetails;
// use App\ImageUpload;




class RentalDetailsController extends Controller
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

    
    public function add_new_rentaldetails()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/rentaldetails/add-rentaldetails');
      }
      else{
        $rentaldetails_data = new AdminRentalDetails();
        $data=$rentaldetails_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/rentaldetails/add-rentaldetails',compact('data'));
      }
      
    }

    public function save_rentaldetails(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/rentaldetails/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);

            $Testimonial_model = new AdminRentalDetails();
            $Testimonial_model->save_rentaldetails($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
         $Testimonial_model = new AdminRentalDetails();
         $Testimonial_model->save_rentaldetails($form_data); 

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
          $image->move(public_path().'/images/rentaldetails/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);
          
          $Testimonial_model = new AdminRentalDetails();
          $Testimonial_model->save_rentaldetails($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
        $Testimonial_model = new AdminRentalDetails();
        $Testimonial_model->save_rentaldetails($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteTestimonial(Request $request){

      $id = $request->input('id');
      
      $Testimonial_del = new AdminRentalDetails();
      $Testimonial_del->delete_rentaldetails($id);
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
