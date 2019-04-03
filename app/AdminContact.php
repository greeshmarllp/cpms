<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminContact extends Model
{
    //
    public function test($form_data)
    {
    	
        	$status=DB::table('contact')->update($form_data);
    }

    public function get_all(){

    	$data = DB::table('contact')->get();
    	return $data;
    }
}
