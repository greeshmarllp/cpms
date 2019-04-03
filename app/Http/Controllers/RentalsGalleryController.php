<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminRentalsGallery;
use App\AdminRentals;




class RentalsGalleryController extends Controller
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

    
    public function add_new_rentals_gallery()
    {
      $id=request()->segment(3);
      $rentals_data = new AdminRentals();
      $rentals_list=$rentals_data->get_all();
      if($id == 'tocken'){
        return view('admin/rentalsgallery/add-rentalsgallery',compact('rentals_list'));
      }
      else{
        $gallery_data = new AdminRentalsGallery();
        $data=$gallery_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/rentalsgallery/add-rentalsgallery',compact('data','rentals_list'));
      }
      
    }

    
      public function save_rentals_gallery(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

         $property_id=$request->input('property_id');

        // foreach($request->file('filename') as $image)
        // {

          $filename=$image->getClientOriginalName();
          $image->move(public_path().'/images/rentalsgallery/', $filename);  
          $data[] = $filename;  
          // $form_data = array('description'=>$request->input('description'),'image'=>$name);
          
          $RentalsGallery_model = new AdminRentalsGallery();
          $RentalsGallery_model->save_rentalsgallery($property_id,$filename);



          // foreach($request->file('filename') as $image)
          // {

          //   $name=$image->getClientOriginalName();
          //   $image->move(public_path().'/images/testimonial/', $name);  
          //   $data[] = $name;  
          //   $form_data = array('description'=>$request->input('description'),'image'=>$name);

          //   $Testimonial_model = new AdminTestimonial();
          //   $Testimonial_model->save_testimonial($form_data); 
          // }

         
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
      
      $Testimonial_del = new AdminRentalsGallery();
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
