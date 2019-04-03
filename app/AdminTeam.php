<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminTeam extends Model{

    public function get_all($id=0){

        if($id =='tocken'){

            $data = DB::table('team')->get();
            return $data;
        }else{

            $data = DB::table('team')->where('id', '=',$id)->get();
            return $data;
        }  
    }

    public function test($form_data,$id=0){

      if($id == 'tocken'){

        $data = DB::table('team')->insert($form_data);
        return $data;
      }else{

        $data = DB::table('team')->where('id', '=',$id)->update($form_data);
        return $data;
      }
    }

    public function delete($id=0){

      $data = DB::table('team')->where('id', '=',$id)->delete();
      return $data;
    }
  }
