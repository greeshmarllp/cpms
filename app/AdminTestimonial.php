<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminTestimonial extends Model{

    public function get_all($id=0){

        if($id =='tocken'){

            $data = DB::table('testimonial')->get();
            return $data;
        }else{

            $data = DB::table('testimonial')->where('id', '=',$id)->get();
            return $data;
        }  
    }

    public function test($form_data,$id=0){

      if($id == 'tocken'){

        $data = DB::table('testimonial')->insert($form_data);
        return $data;
      }else{

        $data = DB::table('testimonial')->where('id', '=',$id)->update($form_data);
        return $data;
      }
    }

    public function delete($id=0){

      $data = DB::table('testimonial')->where('id', '=',$id)->delete();
      return $data;
    }
  }
