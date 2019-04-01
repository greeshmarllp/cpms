<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminFaq extends Model
{

  public function save_faq($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('faq')->insert($form_data);
   }
   else{
     $data = DB::table('faq')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('faq')->get();
   return $data;
 }
 else{
  $data = DB::table('faq')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_faq($id){

 $data = DB::table('faq')->where('id', '=', $id)->delete();
  
}
}
