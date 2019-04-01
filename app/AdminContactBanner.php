<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminContactBanner extends Model
{

  public function save_contactbanner($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('contactbanner')->insert($form_data);
   }
   else{
     $data = DB::table('contactbanner')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('contactbanner')->get();
   return $data;
 }
 else{
  $data = DB::table('contactbanner')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_contactbanner($id){

 $data = DB::table('contactbanner')->where('id', '=', $id)->delete();
  
}
}
