<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminPropertyTypes;
// use App\ImageUpload;




class PropertyTypeController extends Controller
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

    
    public function add_new_property_types()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/propertytypes/add-property-types');
      }
      else{
        $property_types_data = new AdminPropertyTypes();
        $data=$property_types_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/propertytypes/add-property-types',compact('data'));
      }
      
    }

    public function save_property_types(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/propertytypes/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'image'=>$name);

            $type_model = new AdminPropertyTypes();
            $type_model->save_property_types($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'));
         $type_model = new AdminPropertyTypes();
         $type_model->save_property_types($form_data); 

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
          $image->move(public_path().'/images/propertytypes/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'image'=>$name);
          
          $type_model = new AdminPropertyTypes();
          $type_model->save_property_types($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'));
        $type_model = new AdminPropertyTypes();
        $type_model->save_property_types($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeletePropertyTypes(Request $request){

      $id = $request->input('id');
      
      $type_del = new AdminPropertyTypes();
      $type_del->delete_property_types($id);
      if ($type_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
