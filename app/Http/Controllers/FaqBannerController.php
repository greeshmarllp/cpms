<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminFaqBanner;
// use App\ImageUpload;




class FaqBannerController extends Controller
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

    
    public function add_new_faqbanner()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/faqbanner/add-faqbanner');
      }
      else{
        $faqbanner_data = new AdminFaqBanner();
        $data=$faqbanner_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/faqbanner/add-faqbanner',compact('data'));
      }
      
    }

    public function save_faqbanner(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

        if($request->hasfile('filename'))
        {


          foreach($request->file('filename') as $image)
          {

            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/faqbanner/', $name);  
            $data[] = $name;  
            $form_data = array('heading'=>$request->input('heading'),'image'=>$name);

            $FaqBannerModel = new AdminFaqBanner();
            $FaqBannerModel->save_faqbanner($form_data); 
          }

        } else{
// print_r("hy");
// exit();
         $form_data = array('heading'=>$request->input('heading'));
         $FaqBannerModel = new AdminFaqBanner();
         $FaqBannerModel->save_faqbanner($form_data); 

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
          $image->move(public_path().'/images/faqbanner/', $name);  
          $data[] = $name;  
          $form_data = array('heading'=>$request->input('heading'),'image'=>$name);
          
          $FaqBannerModel = new AdminFaqBanner();
          $FaqBannerModel->save_faqbanner($form_data,$id); 
        }

      } 
      else{
        $form_data = array('heading'=>$request->input('heading'));
        $FaqBannerModel = new AdminFaqBanner();
        $FaqBannerModel->save_faqbanner($form_data,$id); 

      }
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteFaqBanner(Request $request){

      $id = $request->input('id');
      
      $faqbanner_del = new AdminFaqBanner();
      $faqbanner_del->delete_faqbanner($id);
      if ($faqbanner_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
