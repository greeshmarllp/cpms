<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\AdminPropertylist;
use App\AdminPropertyTypes;

class PropertyListController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_property(){

        $id = request()->segment(3);
        $propertytype_data = new AdminPropertyTypes();
        $property_type=$propertytype_data->get_all(); 
        // echo "<pre>";
        // print_r($data);
        // exit();

      if($id =='tocken'){

        return view('admin/property-list/add-propertylist',compact('property_type'));
      }else{

        $property_data = new AdminPropertylist();
        $data=$property_data->get_all($id);
        return view('admin/property-list/add-propertylist',compact('data','property_type'));
      }
    }

    public function save(Request $request){
       
        $id = request()->segment(3);
        if($id =='tocken'){

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/propertylist/', $name);  
                    $data[] = $name;  
                    $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'address'=>$request->input('editor2'),'link'=>$request->input('link'),'property_size'=>$request->input('property_size'),'property_id'=>$request->input('property_id'),'price'=>$request->input('price'),'bedroom'=>$request->input('bedroom'),'bathroom'=>$request->input('bathroom'),'available_from'=>$request->input('editor2'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garage'=>$request->input('garage'),'cross_street'=>$request->input('cross_street'),'floors'=>$request->input('floors'),'plumbing'=>$request->input('plumbing'),'property_type'=>$request->input('property_type'),'image' =>$name,'feature'=>$request->input('feature'),'banner'=>$request->input('banner'));
                }
            }else{

                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'address'=>$request->input('editor2'),'link'=>$request->input('link'),'property_size'=>$request->input('property_size'),'property_id'=>$request->input('property_id'),'price'=>$request->input('price'),'bedroom'=>$request->input('bedroom'),'bathroom'=>$request->input('bathroom'),'available_from'=>$request->input('editor2'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garage'=>$request->input('garage'),'cross_street'=>$request->input('cross_street'),'floors'=>$request->input('floors'),'plumbing'=>$request->input('plumbing'),'property_type'=>$request->input('property_type'),'feature'=>$request->input('feature'),'banner'=>$request->input('banner'));
            }
        }else{

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/propertylist/', $name);  
                    $data[] = $name;  
                    $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'address'=>$request->input('editor2'),'link'=>$request->input('link'),'property_size'=>$request->input('property_size'),'property_id'=>$request->input('property_id'),'price'=>$request->input('price'),'bedroom'=>$request->input('bedroom'),'bathroom'=>$request->input('bathroom'),'available_from'=>$request->input('editor2'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garage'=>$request->input('garage'),'cross_street'=>$request->input('cross_street'),'floors'=>$request->input('floors'),'plumbing'=>$request->input('plumbing'),'property_type'=>$request->input('property_type'),'image' =>$name,'feature'=>$request->input('feature'),'banner'=>$request->input('banner'));
                }
            }else{

                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'address'=>$request->input('editor2'),'link'=>$request->input('link'),'property_size'=>$request->input('property_size'),'property_id'=>$request->input('property_id'),'price'=>$request->input('price'),'bedroom'=>$request->input('bedroom'),'bathroom'=>$request->input('bathroom'),'available_from'=>$request->input('editor2'),'status'=>$request->input('status'),'year_built'=>$request->input('year_built'),'garage'=>$request->input('garage'),'cross_street'=>$request->input('cross_street'),'floors'=>$request->input('floors'),'plumbing'=>$request->input('plumbing'),'property_type'=>$request->input('property_type'),'feature'=>$request->input('feature'),'banner'=>$request->input('banner'));
            }
        }
        // echo "<pre>";
        // print_r($form_data);
        // exit();
        $property_model = new AdminPropertylist(); 
        $property_model->test($form_data,$id); 
        return Redirect::to('admin/property-list');
    }

    public function Delete(Request $request){

        $id=$request->input('id');
        $property_model = new AdminPropertylist();
        $result=$property_model->delete($id);
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

