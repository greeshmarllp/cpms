<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\ImageUpload;
use App\AdminTermsofuse;

class TermsofuseController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_termsofuse(){

      $id = request()->segment(3);
      if($id =='tocken'){

        return view('admin/termsofuse/add-termsofuse');
      }else{

        $termsofuse_data = new AdminTermsofuse();
        $data=$termsofuse_data->get_all($id);
        return view('admin/termsofuse/add-termsofuse',compact('data'));
      }
    }

    public function save(Request $request){
       
        $id = request()->segment(3);
        if($id =='tocken'){

            $form_data =array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'));
        }else{

            $form_data =array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'));   
        }
        $termsofuse_data = new AdminTermsofuse(); 
        $termsofuse_data->test($form_data,$id); 
        return Redirect::to('admin/termsofuse');
    }

    public function DeleteTermsofUse(Request $request){

        $id=$request->input('id');
        $termsofuse_data = new AdminTermsofuse();
        $result=$termsofuse_data->delete($id);
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

