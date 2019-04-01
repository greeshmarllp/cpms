<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminGallery extends Model
{
    //
    public function test($form_data)
    {
    	
       $status=DB::table('gallery')->insert($form_data);
   }

   public function get_all($id=0){

    if($id == 0){

        $data = DB::table('gallery')->get();
        return $data;
    }else{

        $data = DB::table('gallery')->where('id', '=',$id)->get();
        return $data;
    }

}

 public function delete_gallery($id){

 $data = DB::table('gallery')->where('id', '=', $id)->delete();
  
}
}
