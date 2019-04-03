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





    public function testimonial(){

        $data = DB::table('testimonial')->get();
        return $data;
    }





    public function get_about_data(){

        $data = DB::table('about')->get();
        return $data;
    }
    public function get_property_faq_data(){

        $data = DB::table('faq')->where('category', '=', 'Property Management FAQ')->get();
        return $data;
    }

    public function get_tenancy_faq_data(){

        $data = DB::table('faq')->where('category', '=', 'During the tenancy')->get();
        return $data;
    }

    

    
    public function get_agreement_faq_data(){

        $data = DB::table('faq')->where('category', '=', 'Ending a Tenancy Agreement')->get();
        return $data;
    }
    public function get_rentals_faq_data(){

        $data = DB::table('rentalsfaq')->get();
        return $data;
    }

    public function get_rentals_data(){

        $data = DB::table('rentals')->get();
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
