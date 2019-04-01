<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminTestimonial extends Model
{

  public function save_testimonial($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('testimonial')->insert($form_data);
   }
   else{
     $data = DB::table('testimonial')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('testimonial')->get();
   return $data;
 }
 else{
  $data = DB::table('testimonial')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_testimonial($id){

 $data = DB::table('testimonial')->where('id', '=', $id)->delete();
  
}
}
