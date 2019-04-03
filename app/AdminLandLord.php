<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminLandLord extends Model
{

  public function save_landlord($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('landlord')->insert($form_data);
   }
   else{
     $data = DB::table('landlord')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('landlord')->get();
   return $data;
 }
 else{
  $data = DB::table('landlord')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_landlord($id){

 $data = DB::table('landlord')->where('id', '=', $id)->delete();
  
}
}
