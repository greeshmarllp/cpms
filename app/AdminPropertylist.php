<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminPropertylist extends Model{

    public function get_all($id=0){

      if($id =='tocken'){ 

        $data = DB::table('propertylist')->select('propertylist.id','propertylist.image','propertylist.heading','property_types.heading as type','propertylist.feature','propertylist.banner')->join('property_types','property_types.id','=','propertylist.property_type')->get();
        return $data;
      }else{

        $data = DB::table('propertylist')->where('id', '=',$id)->get();
        return $data;
      }   
    }

    public function test($form_data,$id=0){

      if($id =='tocken'){

          $status=DB::table('propertylist')->insert($form_data);
      }else{

        $status=DB::table('propertylist')->where('id', '=',$id)->update($form_data);
      }
    }

    public function delete($id=0){

      $data = DB::table('propertylist')->where('id', '=',$id)->delete();
      return $data;
    }

    public function get_data(){

        $data = DB::table('propertylist')->select('id','heading')->get();
        return $data;
    }
  }
