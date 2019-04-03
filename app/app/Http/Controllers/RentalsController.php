<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminRentals;
use App\AdminPropertyTypes;




class RentalsController extends Controller
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

    
    public function add_new_rentals()
    {
      $id=request()->segment(3);
      $property_types_data = new AdminPropertyTypes();
      $property_type_list=$property_types_data->get_all();
      if($id == 'tocken'){
        return view('admin/rentals/add-rentals',compact('property_type_list'));
      }
      else{
        $rentals_data = new AdminRentals();
        $data=$rentals_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/rentals/add-rentals',compact('data','property_type_list'));
      }
      
    }

    public function save_rentals(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/rentals/', $name);  
            $data[] = $name;  
            $form_data = array('property_type_id'=>$request->input('property_type_id'),'property_id'=>$request->input('property_id'),'heading'=>$request->input('heading'),'description'=>$request->input('description'),'address'=>$request->input('address'),'price'=>$request->input('price'),'property_size'=>$request->input('property_size'),'bedrooms'=>$request->input('bedrooms'),'bathrooms'=>$request->input('bathrooms'),'available_from'=>$request->input('available_from'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garages'=>$request->input('garages'),'cross_streets'=>$request->input('cross_streets'),'floors'=>$request->input('floors'),'plumping'=>$request->input('plumping'),'featured'=>$request->input('featured'),'banner'=>$request->input('banner'),'image'=>$name);

            $Rentals_model = new AdminRentals();
            $Rentals_model->save_rentals($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('property_type_id'=>$request->input('property_type_id'),'property_id'=>$request->input('property_id'),'heading'=>$request->input('heading'),'description'=>$request->input('description'),'address'=>$request->input('address'),'price'=>$request->input('price'),'property_size'=>$request->input('property_size'),'bedrooms'=>$request->input('bedrooms'),'bathrooms'=>$request->input('bathrooms'),'available_from'=>$request->input('available_from'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garages'=>$request->input('garages'),'cross_streets'=>$request->input('cross_streets'),'floors'=>$request->input('floors'),'plumping'=>$request->input('plumping'),'featured'=>$request->input('featured'),'banner'=>$request->input('banner'));
         $Rentals_model = new AdminRentals();
         $Rentals_model->save_rentals($form_data); 

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
          $image->move(public_path().'/images/rentals/', $name);  
          $data[] = $name;  
          $form_data = array('property_type_id'=>$request->input('property_type_id'),'property_id'=>$request->input('property_id'),'heading'=>$request->input('heading'),'description'=>$request->input('description'),'address'=>$request->input('address'),'price'=>$request->input('price'),'property_size'=>$request->input('property_size'),'bedrooms'=>$request->input('bedrooms'),'bathrooms'=>$request->input('bathrooms'),'available_from'=>$request->input('available_from'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garages'=>$request->input('garages'),'cross_streets'=>$request->input('cross_streets'),'floors'=>$request->input('floors'),'plumping'=>$request->input('plumping'),'featured'=>$request->input('featured'),'banner'=>$request->input('banner'),'image'=>$name);
          
          $Rentals_model = new AdminRentals();
          $Rentals_model->save_rentals($form_data,$id); 
        }

      } 
      else{
        $form_data = array('property_type_id'=>$request->input('property_type_id'),'property_id'=>$request->input('property_id'),'heading'=>$request->input('heading'),'description'=>$request->input('description'),'address'=>$request->input('address'),'price'=>$request->input('price'),'property_size'=>$request->input('property_size'),'bedrooms'=>$request->input('bedrooms'),'bathrooms'=>$request->input('bathrooms'),'available_from'=>$request->input('available_from'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garages'=>$request->input('garages'),'cross_streets'=>$request->input('cross_streets'),'floors'=>$request->input('floors'),'plumping'=>$request->input('plumping'),'featured'=>$request->input('featured'),'banner'=>$request->input('banner'));
        $Rentals_model = new AdminRentals();
        $Rentals_model->save_rentals($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteRentals(Request $request){

      $id = $request->input('id');
      
      $Rentals_del = new AdminRentals();
      $Rentals_del->delete_rentals($id);
      if ($Rentals_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
