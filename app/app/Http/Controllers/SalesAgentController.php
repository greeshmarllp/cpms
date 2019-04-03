<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\AdminSalesAgent;


class SalesAgentController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_salesagent(){

        $id = request()->segment(3);
        if($id =='tocken'){

            return view('admin/sales-agent/add-salesagent');
        }else{

            $salesagent_data = new AdminSalesAgent();
            $data=$salesagent_data->get_all($id);
            return view('admin/sales-agent/add-salesagent',compact('data'));
        }
    }

    public function save(Request $request){
       
       $id = request()->segment(3);
        if($id =='tocken'){

            $form_data =array('description'=>$request->input('editor1'));
        }else{

            $form_data =array('description'=>$request->input('editor1')); 
        }
        $salesagent_data = new AdminSalesAgent(); 
        $salesagent_data->test($form_data,$id); 
        return Redirect::to('admin/sales-agent');
    }

    public function Delete(Request $request){

        $id=$request->input('id');
        $salesagent_data = new AdminSalesAgent();
        $result=$salesagent_data->delete($id);
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

