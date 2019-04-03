<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\AdminSalesGallery;
use App\AdminPropertylist;
use App\AdminPropertyTypes;

class SalesGalleryController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_gallery(){

        $id = request()->segment(3);
        $propertytype_data = new AdminPropertyTypes();
        $property_type=$propertytype_data->get_all();
        
        $category_data= new AdminPropertylist();
        $category=$category_data->get_data();
        
        if($id =='tocken'){


            return view('admin/sales-gallery/add-salesgallery',compact('category','property_type'));
        }else{

            
        $gallery_data = new AdminSalesGallery();
        $data['edit_item']=$gallery_data->get_all($id);
        $edit_item=$data['edit_item'];
        // echo "<pre>";
        // print_r($edit_item);
        // exit();
        return view('admin/sales-gallery/add-salesgallery',compact('data','category','property_type','edit_item'));
        }
    }

    public function save(Request $request){
       
        if($request->hasfile('file')){

            $image = $request->file('file');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/salesgallery/', $name);
            $data[] = $name; 
            $form_data = array('property_id'=>$request->input('property_id'),'image' =>$name,'property_type'=>$request->input('property_type'));

            $gallery_data = new AdminSalesGallery();
            $result=$gallery_data->test($form_data);
            return Redirect::to('admin/sales-gallery');

        }else{

            print_r("Error");
        }
    }

    public function reorderposition(Request $request){

        $imageids_arr =$request->input('imageids');
        $gallery_data = new AdminSalesGallery();
        $result=$gallery_data->updateposition($imageids_arr);
        if ($result == TRUE) {

            $response['status']='success';
            $response['message']='Deleted Successfully';
        } else {

            $response['status']='error';
            $response['message']='invalid data!...';
        }
        echo json_encode($response);
    }

    public function deleteimage(Request $request){

        $imageids_array =$request->input('imageids');
        $gallery_data = new AdminSalesGallery();
        $result=$gallery_data->delete_image($imageids_array);
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

