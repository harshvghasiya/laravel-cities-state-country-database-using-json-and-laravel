<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    function __construct()
    {
    	$this->city = file_get_contents("cities.json");	
    }


      /**
     * [store This function is used to Add state into database]
     * @return [type] [description]
     * @author Softtechover [Harsh V].
    */

    public function store(Request $request)
    {
    	$all_city=json_decode($this->city);
    	foreach ($all_city as $key => $value) {
     		  $exist=City::where('name',$value->name)->where('country_id',$value->country_id)->where('state_id',$value->state_id)->first();
             
     		  if ($exist == null) {
     			$res=new City;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->country_id=$value->country_id;
     			$res->country_code=$value->country_code;
     			$res->state_id=$value->state_id;
     			$res->state_code=$value->state_code;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' City Saved Successfully <br>';
     		  }else{
     		  	echo $value->name .' Exist <br>';
     		  }
     		}	
    }


     public function stateIdCityStore(Request $request,$id)
    {
    	$all_city=json_decode($this->city);
    	$msg = "";

    	foreach ($all_city as $key => $value) {
     		  $exist=City::where('name',$value->name)->where('country_id',$value->country_id)->where('state_code',$value->state_code)->first();
             if ($value->state_id == $id) {
     		  if ($exist == null) {
     			$res=new City;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->country_id=$value->country_id;
     			$res->country_code=$value->country_code;
     			$res->state_id=$value->state_id;
     			$res->state_code=$value->state_code;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' City Saved Successfully <br>';
     		  }
     		}else{
     			
     		}
		}

        echo $msg;
		return "<br> Task Complated";
    }

      public function countryIdCityStore(Request $request,$id)
    {
    	$all_city=json_decode($this->city);
    	$msg = "";

    	foreach ($all_city as $key => $value) {
     		  $exist=City::where('name',$value->name)->where('country_id',$value->country_id)->where('state_code',$value->state_code)->first();
             if ($value->country_id == $id) {
     		  if ($exist == null) {
     			$res=new City;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->country_id=$value->country_id;
     			$res->country_code=$value->country_code;
     			$res->state_id=$value->state_id;
     			$res->state_code=$value->state_code;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' City Saved Successfully <br>';
     		  }
     		}else{
     			
     		}
		}

        echo $msg;
		return "<br> Task Complated";
    }
}
