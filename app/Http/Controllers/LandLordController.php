<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminLandLord;
// use App\ImageUpload;




class LandLordController extends Controller
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

    
    public function add_new_land_lord()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/landlord/add-land-lord');
      }
      else{
        $land_lord_data = new AdminLandLord();
        $data=$land_lord_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/landlord/add-land-lord',compact('data'));
      }
      
    }

    public function save_land_lord(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/landlord/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);

            $Testimonial_model = new AdminLandLord();
            $Testimonial_model->save_landlord($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
         $Testimonial_model = new AdminLandLord();
         $Testimonial_model->save_landlord($form_data); 

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
          $image->move(public_path().'/images/landlord/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'),'image'=>$name);
          
          $Testimonial_model = new AdminLandLord();
          $Testimonial_model->save_landlord($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('description'));
        $Testimonial_model = new AdminLandLord();
        $Testimonial_model->save_landlord($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteTestimonial(Request $request){

      $id = $request->input('id');
      
      $Testimonial_del = new AdminLandLord();
      $Testimonial_del->delete_land_lord($id);
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
