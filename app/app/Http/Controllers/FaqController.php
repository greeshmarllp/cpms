<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminFaq;
// use App\ImageUpload;




class FaqController extends Controller
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

    
    public function add_new_Faq()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/faq/add-faq');
      }
      else{
        $Faq_data = new AdminFaq();
        $data=$Faq_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/faq/add-faq',compact('data'));
      }
      
    }

    public function save_Faq(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

// print_r("hy");
// exit();
         $form_data = array('category'=>$request->input('category'),'question'=>$request->input('question'),'answer'=>$request->input('answer'));
         $Faq_model = new AdminFaq();
         $Faq_model->save_faq($form_data); 

       
     }
// end adding
// editing start
     else{

        $form_data = array('category'=>$request->input('category'),'question'=>$request->input('question'),'answer'=>$request->input('answer'));
        $Faq_model = new AdminFaq();
        $Faq_model->save_faq($form_data,$id); 

      
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteFaq(Request $request){

      $id = $request->input('id');
      
      $Faq_del = new AdminFaq();
      $Faq_del->delete_Faq($id);
      if ($Faq_del == TRUE) {
        $response['status']='success';
        $response['message']='Deleted Successfully';
      } else {
        $response['status']='error';
        $response['message']='invalid data!...';
      }
      echo json_encode($response);
    }

  }
