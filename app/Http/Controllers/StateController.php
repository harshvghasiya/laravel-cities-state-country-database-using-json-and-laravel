<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    function __construct()
    {
    	$this->state = file_get_contents("states.json");	
    }


      /**
     * [store This function is used to Add state into database]
     * @return [type] [description]
     * @author Softtechover [Harsh V].
    */

    public function store(Request $request)
    {
    	$all_state=json_decode($this->state);

    	foreach ($all_state as $key => $value) {
     		  $exist=State::where('name',$value->name)->where('country_id',$value->country_id)->where('state_code',$value->state_code)->first();
             
     		  if ($exist == null) {
     			$res=new State;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->country_id=$value->country_id;
     			$res->country_code=$value->country_code;
     			$res->state_code=$value->state_code;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' State Saved Successfully <br>';
     		  }else{
     		  	echo $value->name .' Exist <br>';
     		  }
     		}	
    }


    public function stateByCountryStore(Request $request,$id)
    {
    	$all_state=json_decode($this->state);
    	$msg = "";

    	foreach ($all_state as $key => $value) {
     		  $exist=State::where('name',$value->name)->where('country_id',$value->country_id)->where('state_code',$value->state_code)->first();
             if ($value->country_id == $id) {
     		  if ($exist == null) {
     			$res=new State;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->country_id=$value->country_id;
     			$res->country_code=$value->country_code;
     			$res->state_code=$value->state_code;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' State Saved Successfully <br>';
     		  }
     		}else{
     			
     		}
		}

        echo $msg;
		return "<br> Task Complated";
    }
}
