<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminGallery;
use App\ImageUpload;

class GallleryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function save(Request $request)
  {
    if($request->hasfile('filename')){

      foreach($request->file('filename') as $image){

        $name=$image->getClientOriginalName();
        $image->move(public_path().'/images/gallery/', $name);   
        $data[] = $name;
        $form_data = array('heading'=>$request->input('title'),'image'=>$name);
        $Gallery_model = new AdminGallery();
        $Gallery_model->test($form_data);
      }
    }else{

      $form_data = array('heading'=>$request->input('title'));
    }
    return Redirect::back();
  }


  public function DeleteGallery(Request $request){

    $id = $request->input('id');

    $result = new AdminGallery();
    $result->delete_gallery($id);
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
