<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminRentals extends Model
{

  public function save_rentals($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('rentals')->insert($form_data);
   }
   else{
     $data = DB::table('rentals')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('rentals')->get();
   return $data;
 }
 else{
  $data = DB::table('rentals')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_rentals($id){

 $data = DB::table('rentals')->where('id', '=', $id)->delete();
  
}
}
