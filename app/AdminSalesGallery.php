<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminSalesGallery extends Model{

  public function get_all($id=0){

    if($id =='tocken'){

       $data = DB::table('salesgallery')->select(DB::raw('count(*) as total'),'salesgallery.id','salesgallery.image','propertylist.heading as heading','salesgallery.property_id')->leftJoin('propertylist','propertylist.id','=','salesgallery.property_id')->groupBy('salesgallery.property_id')->get();

      // echo $data; die;

      return $data;
    }else{


      $data = DB::table('salesgallery')->select('salesgallery.id','salesgallery.image','propertylist.heading as heading')->join('propertylist','propertylist.id','=','salesgallery.property_id')->where('salesgallery.property_id', '=',$id)->orderBy('sort','ASC')->get();
      return $data;
    }   
  }

  public function test($form_data){

    $data = DB::table('salesgallery')->insert($form_data);
    return $data;
  }

  public function delete($id=0){

    $data = DB::table('salesgallery')->where('id', '=',$id)->delete();
    return $data;
  }

  public function updateposition($imageids_arr){

    $position = 1;
    foreach($imageids_arr as $id){

     $data= DB::update('update salesgallery set sort = ? where id = ?',[$position,$id]);

        // $data = DB::table('salesgallery')->where('id', '=',$id)->update($form_data);
        // $this->db->query("UPDATE salesgallery SET sort=".$position." WHERE id=".$id);

     $position ++;

   }
   return $data;
 }

 public function delete_image($imageids_array){

   $data = DB::table('salesgallery')->where('id', '=',$imageids_array)->delete();
   return $data;
 }
}