<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminAbout extends Model
{

  public function save_about($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('about')->insert($form_data);
   }
   else{
     $data = DB::table('about')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('about')->get();
   return $data;
 }
 else{
  $data = DB::table('about')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_about($id){

 $data = DB::table('about')->where('id', '=', $id)->delete();
  
}
}
