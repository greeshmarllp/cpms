<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminPropertyTypes extends Model
{

  public function save_property_types($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('property_types')->insert($form_data);
   }
   else{
     $data = DB::table('property_types')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('property_types')->get();
   return $data;
 }
 else{
  $data = DB::table('property_types')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_property_types($id){

 $data = DB::table('property_types')->where('id', '=', $id)->delete();
  
}
}
