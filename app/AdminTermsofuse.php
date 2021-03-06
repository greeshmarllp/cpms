<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminTermsofuse extends Model{

    public function get_all($id=0){

        if($id =='tocken'){

            $data = DB::table('termsofuse')->get();
            return $data;
        }else{

            $data = DB::table('termsofuse')->where('id', '=',$id)->get();
            return $data;
        }  
    }

    public function test($form_data,$id=0){

      if($id == 'tocken'){

        $data = DB::table('termsofuse')->insert($form_data);
        return $data;
      }else{

        $data = DB::table('termsofuse')->where('id', '=',$id)->update($form_data);
        return $data;
      }
    }

    public function delete($id=0){

      $data = DB::table('termsofuse')->where('id', '=',$id)->delete();
      return $data;
    }
  }
