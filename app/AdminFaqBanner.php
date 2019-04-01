<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminFaqBanner extends Model
{

  public function save_faqbanner($form_data,$id=0)
  {
    if($id == 0){

     $status=DB::table('faqbanner')->insert($form_data);
   }
   else{
     $data = DB::table('faqbanner')->where('id', '=', $id)->update($form_data);
     return $data;
   }
 }

 public function get_all($id=0){
  if($id == 0){
   $data = DB::table('faqbanner')->get();
   return $data;
 }
 else{
  $data = DB::table('faqbanner')->where('id', '=', $id)->get();
  return $data;
}
}


public function delete_faqbanner($id){

 $data = DB::table('faqbanner')->where('id', '=', $id)->delete();
  
}
}
