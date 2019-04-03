<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminSalesAgent extends Model{

    public function get_all($id=0){

      if($id =='tocken'){ 

        $data = DB::table('sales_agent')->get();
        return $data;
      }else{

        $data = DB::table('sales_agent')->where('id', '=',$id)->get();
        return $data;
      }   
    }

    public function test($form_data,$id=0){

      if($id =='tocken'){

          $status=DB::table('sales_agent')->insert($form_data);
      }else{

        $status=DB::table('sales_agent')->where('id', '=',$id)->update($form_data);
      }
    }

    public function delete($id=0){

      $data = DB::table('sales_agent')->where('id', '=',$id)->delete();
      return $data;
    }
}
