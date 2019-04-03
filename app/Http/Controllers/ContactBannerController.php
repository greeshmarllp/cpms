<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminContactBanner;
// use App\ImageUpload;




class ContactBannerController extends Controller
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

    
    public function add_new_contactbanner()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/contactbanner/add-contactbanner');
      }
      else{
        $contactbanner_data = new AdminContactBanner();
        $data=$contactbanner_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/contactbanner/add-contactbanner',compact('data'));
      }
      
    }

    public function save_contactbanner(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/contactbanner/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'image'=>$name);

            $FaqBannerModel = new AdminContactBanner();
            $FaqBannerModel->save_contactbanner($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'));
         $FaqBannerModel = new AdminContactBanner();
         $FaqBannerModel->save_contactbanner($form_data); 

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
          $image->move(public_path().'/images/contactbanner/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'image'=>$name);
          
          $FaqBannerModel = new AdminContactBanner();
          $FaqBannerModel->save_contactbanner($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'));
        $FaqBannerModel = new AdminContactBanner();
        $FaqBannerModel->save_contactbanner($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteFaqBanner(Request $request){

      $id = $request->input('id');
      
      $contactbanner_del = new AdminContactBanner();
      $contactbanner_del->delete_contactbanner($id);
      if ($contactbanner_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
