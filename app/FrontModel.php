<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;

class FrontModel extends Model
{
    public function home_banner(){

        $data = DB::table('banner')->get();
        return $data;
    }

    public function second_section(){

        $data = DB::table('secondsection')->get();
        return $data;
    }

    public function home_service(){

        $data = DB::table('service')->get();
        return $data;
    }

    public function gallery(){

        $data = DB::table('gallery')->get();
        return $data;
    }

    public function content(){

        $data = DB::table('content')->get();
        return $data;
    }

    public function testimonial(){

        $data = DB::table('testimonial')->get();
        return $data;
    }

    public function mission(){

        $data = DB::table('mission')->get();
        return $data;
    }

    public function vission(){

        $data = DB::table('vission')->get();
        return $data;
    }

     public function aboutcontent(){

        $data = DB::table('about_content')->get();
        return $data;
    }

    public function get_associate_list(){

        $data = DB::table('associates')->get();
        return $data;
    }
    
    public function get_gallery_list(){

        $data = DB::table('gallery')->get();
        return $data;
    }
    
    public function get_contact_list(){

        $data = DB::table('contact')->get();
        return $data;
    }

    
    public function get_catalogue_list(){

        $query = DB::table('firstlevel')->get();
        // echo "<pre>";
        // print_r($query);
        // exit();
        $return = array();
        foreach ($query as $firstlevel)
        {
            // echo $firstlevel->id; die;

            $return[$firstlevel->id] = $firstlevel;
        $return[$firstlevel->id]->secondlevel = $this->get_secondlevel($firstlevel->id); // Get the categories sub categories
    }
// echo "<pre>";
//        print_r($return);
//        exit();
    return $return;
}

public function get_secondlevel($firstlevel_id)
{
    // print_r($firstlevel_id);
    // exit();

    $data = DB::table('secondlevel')->where('firstlevel_id', '=', $firstlevel_id)->get();

    // $this->db->where('firstlevel_id', $firstlevel_id);
    // $query = $this->db->get('secondlevel');

    foreach ($data as $secondlevel)
    {
        $return[$secondlevel->id] = $secondlevel;
        // $return[$secondlevel->id]->product = $this->get_sub_categories_product($secondlevel->id);
        $return[$secondlevel->id]->thirdlevel = $this->get_thirdlevel($secondlevel->id); // Get the 
    }
    return $data;
}

public function get_thirdlevel($secondlevel_id)
{
    $data = DB::table('thirdlevel')->where('secondlevel_id', '=', $secondlevel_id)->get();
    //  $this->db->where('secondlevel', $secondlevel_id);
    // $query = $this->db->get('thirdlevel');

    foreach ($data as $thirdlevel)
    {
        $return[$thirdlevel->id] = $thirdlevel;
        $return[$thirdlevel->id]->fourthlevel = $this->get_fourthlevel($thirdlevel->id); // Get the categories sub categories
    }
    return $data;
    
}
public function get_fourthlevel($thirdlevel_id)
{
    $data = DB::table('fourthlevel')->where('thirdlevel_id', '=', $thirdlevel_id)->get();



    return $data;

}
public function get_content_list(){

    $data = DB::table('catalogue_content')->limit(1)->get();
    return $data;
}
public function get_content_firstlevel_list($data){
    $data=DB::table('catalogue_content')
    ->select('catalogue_content.id','catalogue_content.description','firstlevel.heading')
    ->join('firstlevel','firstlevel.id','=','catalogue_content.firstlevel_id')
    ->where(['firstlevel.heading' => $data])
    ->get();
    return $data;
}


public function get_content_secondlevel_list($data){
    $data=DB::table('catalogue_content')
    ->select('catalogue_content.id','catalogue_content.description','secondlevel.heading')
    ->join('secondlevel','secondlevel.id','=','catalogue_content.secondlevel_id')
    ->where(['secondlevel.heading' => $data])
    ->get();
    return $data;
}

public function get_content_thirdlevel_list($data){
    $data=DB::table('catalogue_content')
    ->select('catalogue_content.id','catalogue_content.description','thirdlevel.heading')
    ->join('thirdlevel','thirdlevel.id','=','catalogue_content.thirdlevel_id')
    ->where(['thirdlevel.heading' => $data])
    ->get();
    return $data;
}

public function get_content_fourthlevel_list($data){
    $data=DB::table('catalogue_content')
    ->select('catalogue_content.id','catalogue_content.description','fourthlevel.heading')
    ->join('fourthlevel','fourthlevel.id','=','catalogue_content.fourthlevel_id')
    ->where(['fourthlevel.heading' => $data])
    ->get();
    return $data;
}
}
