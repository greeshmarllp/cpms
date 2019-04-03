<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminBanner;
use App\ImageUpload;

class BannerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function save(Request $request)
    {
        $id = request()->segment(3);

        if($id =='tocken'){

            if($request->hasfile('filename'))
            {

                foreach($request->file('filename') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/banner/', $name);  
                    $data[] = $name;  
                }

                
                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'image' =>$name,'link'=>$request->input('link')); 

                
            } else{

                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'link'=>$request->input('link')); 
            }
        }else{

         if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/banner/', $name);  
                $data[] = $name;  
            }

            
            $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'image' =>$name,'link'=>$request->input('link')); 

            
        } else{

            $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'link'=>$request->input('link')); 
        } 
    }
        // print_r($form_data);
        // exit();
    $banner_model = new AdminBanner();
    $banner_model->test($form_data,$id); 

    return Redirect::back();
}

public function DeleteBanner(Request $request){

  $id = $request->input('id');
  
  $result = new AdminBanner();
  $result->delete_banner($id);
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
