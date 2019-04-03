<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\AdminSalesDetails;


class SalesDetailsController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_salesdeails(){

        $id = request()->segment(3);
        if($id =='tocken'){

            return view('admin/sales-details/add-salesdetails');
        }else{

            $salesdetails_data = new AdminSalesDetails();
            $data=$salesdetails_data->get_all($id);
            return view('admin/sales-details/add-salesdetails',compact('data'));
        }
    }

    public function save(Request $request){
       
       $id = request()->segment(3);
        if($id =='tocken'){

            $form_data =array('description'=>$request->input('editor1'));
        }else{

            $form_data =array('description'=>$request->input('editor1')); 
        }
        $salesdetails_data = new AdminSalesDetails(); 
        $salesdetails_data->test($form_data,$id); 
        return Redirect::to('admin/sales-details');
    }

    public function Delete(Request $request){

        $id=$request->input('id');
        $salesdetails_data = new AdminSalesDetails();
        $result=$salesdetails_data->delete($id);
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

