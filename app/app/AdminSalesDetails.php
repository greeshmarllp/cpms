<?php

  namespace App;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\DB;

  class AdminSalesDetails extends Model{

    public function get_all($id=0){

      if($id =='tocken'){ 

        $data = DB::table('sales_details')->get();
        return $data;
      }else{

        $data = DB::table('sales_details')->where('id', '=',$id)->get();
        return $data;
      }   
    }

    public function test($form_data,$id=0){

      if($id =='tocken'){

          $status=DB::table('sales_details')->insert($form_data);
      }else{

        $status=DB::table('sales_details')->where('id', '=',$id)->update($form_data);
      }
    }

    public function delete($id=0){

      $data = DB::table('sales_details')->where('id', '=',$id)->delete();
      return $data;
    }
}
