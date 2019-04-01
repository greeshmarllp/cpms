<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminRentalsGallery extends Model
{

  public function save_rentalsgallery($property_id,$filename)
  {
   

     $status=DB::table('rentals_gallery')->insert($form_data);
   
   // else{
   //   $data = DB::table('rentals_gallery')->where('id', '=', $id)->update($form_data);
   //   return $data;
   // }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('rentals_gallery')->get();
   return $data;
 }
 else{
  $data = DB::table('rentals_gallery')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_rentals_gallery($id){

 $data = DB::table('rentals_gallery')->where('id', '=', $id)->delete();
  
}
}
