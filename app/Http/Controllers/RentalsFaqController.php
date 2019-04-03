<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\AdminRentalsFaq;
// use App\ImageUpload;




class RentalsFaqController extends Controller
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

    
    public function add_new_rentalsfaq()
    {
      $id=request()->segment(3);
        // print_r($id);
        // exit();
      if($id == 'tocken'){
        return view('admin/rentalsfaq/add-rentalsfaq');
      }
      else{
        $Faq_data = new AdminRentalsFaq();
        $data=$Faq_data->get_all($id);
            // print_r($data);
            // exit();
        return view('admin/rentalsfaq/add-rentalsfaq',compact('data'));
      }
      
    }

    public function save_rentalsfaq(Request $request)
    {
      $id=request()->segment(3);
// start adding
      if($id == 'tocken'){

// print_r("hy");
// exit();
         $form_data = array('question'=>$request->input('question'),'answer'=>$request->input('answer'));
         $Faq_model = new AdminRentalsFaq();
         $Faq_model->save_rentalsfaq($form_data); 

       
     }
// end adding
// editing start
     else{

        $form_data = array('question'=>$request->input('question'),'answer'=>$request->input('answer'));
        $Faq_model = new AdminRentalsFaq();
        $Faq_model->save_rentalsfaq($form_data,$id); 

      
    }
// editing ends

    return Redirect::back();
    }// end function

    public function DeleteRentalsFaq(Request $request){

      $id = $request->input('id');
      
      $Faq_del = new AdminRentalsFaq();
      $Faq_del->delete_rentalsfaq($id);
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
