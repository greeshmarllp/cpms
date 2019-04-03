<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminRentalsFaq extends Model
{

  public function save_rentalsfaq($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('rentalsfaq')->insert($form_data);
   }
   else{
     $data = DB::table('rentalsfaq')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('rentalsfaq')->get();
   return $data;
 }
 else{
  $data = DB::table('rentalsfaq')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_rentalsfaq($id){

 $data = DB::table('rentalsfaq')->where('id', '=', $id)->delete();
  
}
}
