<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminAboutBanner extends Model
{

    public function get_all($id=0){

        if($id =='tocken'){

            $data = DB::table('aboutbanner')->get();
            return $data;
        }else{

            $data = DB::table('aboutbanner')->where('id', '=',$id)->get();
            return $data;
        }
        
    }

    public function test($form_data,$id=0){

    	if($id =='tocken'){

            $status=DB::table('aboutbanner')->insert($form_data);
        }else{

            $status=DB::table('aboutbanner')->where('id', '=',$id)->update($form_data);
        }
    }
}