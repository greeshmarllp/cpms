<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminRentalDetails extends Model
{

  public function save_rentaldetails($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('rentaldetails')->insert($form_data);
   }
   else{
     $data = DB::table('rentaldetails')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('rentaldetails')->get();
   return $data;
 }
 else{
  $data = DB::table('rentaldetails')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_rentaldetails($id){

 $data = DB::table('rentaldetails')->where('id', '=', $id)->delete();
  
}
}
