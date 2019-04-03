<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use App\AdminTeam;

class TeamController extends Controller{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function add_team(){

      $id = request()->segment(3);
      if($id =='tocken'){

        return view('admin/team/add-team');
      }else{

        $team_data = new AdminTeam();
        $data=$team_data->get_all($id);
        // print_r($data);
        // exit();
        return view('admin/team/add-team',compact('data'));
      }
    }

    public function save(Request $request){

        $id = request()->segment(3);
        if($id =='tocken'){

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/team/', $name);  
                    $data[] = $name;  
                    $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'position'=>$request->input('position'),'image' =>$name); 
                }
            }else{

                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'position'=>$request->input('position'));
            }
        }else{

            if($request->hasfile('filename')){

                foreach($request->file('filename') as $image){

                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/team/', $name);  
                    $data[] = $name;  
                    $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'position'=>$request->input('position'),'image' =>$name); 
                }
            } else{

                $form_data = array('heading'=>$request->input('heading'),'description'=>$request->input('editor1'),'position'=>$request->input('position')); 
            } 
        }

        $team_data = new AdminTeam(); 
        $team_data->test($form_data,$id); 
        return Redirect::to('admin/team');
    }

    public function Delete(Request $request){

        $id=$request->input('id');
        $team_data = new AdminTeam();
        $result=$team_data->delete($id);
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

