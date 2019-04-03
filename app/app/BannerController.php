<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminBanner extends Model
{
    // 
    public function test($form_data,$id=0)
    {
    	if($id == 0){

        	$status=DB::table('banner')->insert($form_data);
    	}else{

    		$status=DB::table('banner')->where('id', '=',$id)->update($form_data);
    	}
    }

     public function get_all($id=0){

     	// print_r($id);
     	// exit();
     	if($id == 0){

     		$data = DB::table('banner')->get();
    		return $data;
     	}else{
     		
     		$data = DB::table('banner')->where('id', '=',$id)->get();
     		return $data;
     	}
    	
    }

}
