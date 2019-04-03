<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminContact;
use App\ImageUpload;

class SavecontactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save_contact(Request $request)
    {
            if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/contact/', $name);  
                $data[] = $name;  
            }
            $form_data = array('address'=>$request->input('editor1'),'landline'=>$request->input('landline'),'mobile'=>$request->input('mobile'),'email'=>$request->input('email'),'reception_email'=>$request->input('reception_email'),'manager_email'=>$request->input('manager_email'),'image' =>$name,'facebook'=>$request->input('facebook'),'twitter'=>$request->input('twitter'),'pinterest'=>$request->input('pinterest'),'google'=>$request->input('google'));

         } else{

            
               $form_data = array('address'=>$request->input('editor1'),'landline'=>$request->input('landline'),'mobile'=>$request->input('mobile'),'email'=>$request->input('email'),'reception_email'=>$request->input('reception_email'),'manager_email'=>$request->input('manager_email'),'facebook'=>$request->input('facebook'),'twitter'=>$request->input('twitter'),'pinterest'=>$request->input('pinterest'),'google'=>$request->input('google'));

            
         }
            
        $Contact_model = new AdminContact();
        $Contact_model->test($form_data); 

        return Redirect::back();
    }
    
}
