<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CountryController extends Controller
{
	function __construct()
	{
		$this->country = file_get_contents("countries.json");
          $this->state = file_get_contents("states.json");
          $this->city = file_get_contents("cities.json");
          $this->alldata=file_get_contents("countries+states+cities.json");
	}


     /**
     * [store This function is used to Add Country into database]
     * @return [type] [description]
     * @author Softtechover [Harsh V].
    */

     public function store(Request $request)
     {
     	$all_country= json_decode($this->country);
     dd($all_country);
     	foreach ($all_country as $key => $value) {
     		  $exist=Country::where('name',$value->name)->where('iso3',$value->iso3)->where('iso2',$value->iso2)->first();
             
     		  if ($exist == null) {
     			$res=new Country;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->iso3=$value->iso3;
     			$res->iso2=$value->iso2;
     			$res->phone_code=$value->phone_code;
     			$res->capital=$value->capital;
     			$res->currency=$value->currency;
     			$res->currency_symbol=$value->currency_symbol;
     			$res->native=$value->native;
     			$res->region=$value->region;
     			$res->subregion=$value->subregion;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' Country Saved Successfully <br>';
     		  }else{
     		  	echo $value->name .' Exist <br>';
     		  }
     		}	
     	return 'All Country Added';
     }
	 /**
     * [iso3Store This function is used to Add Country into database by iso]
     * @return [type] [description]
     * @author Softtechover [Harsh V].
    */

     public function iso3Store(Request $request,$iso)
     {
     	$all_country= json_decode($this->country);
        $isode="";
     	foreach ($all_country as $key => $value) {
     		  $exist=Country::where('name',$value->name)->where('iso3',$iso)->first();
             if ($value->iso3==$iso) {
     		  if ($exist == null ) {
     			$res=new Country;
     			$res->id=$value->id;
     			$res->name=$value->name;
     			$res->iso3=$value->iso3;
     			$res->iso2=$value->iso2;
     			$res->phone_code=$value->phone_code;
     			$res->capital=$value->capital;
     			$res->currency=$value->currency;
     			$res->currency_symbol=$value->currency_symbol;
     			$res->native=$value->native;
     			$res->region=$value->region;
     			$res->subregion=$value->subregion;
     			$res->latitude=$value->latitude;
     			$res->longitude=$value->longitude;
     			$res->save();

     			echo $res->name .' Country Saved Successfully <br>';
		     	return '<br> Task Complated';

     		  }else{
     		  	echo $value->name .' Exist <br>';
		     	return '<br> Task Complated';

     		  }
     		}else{
     			$isode="iso not exist";
     		}	
        }
        echo $isode;
     	return '<br> Task Complated';
     }


     public function allStore()
     {
          $all_country=json_decode($this->country);
          
                     Country::truncate();
                    State::truncate();
                    City::truncate();
          foreach ($all_country as $key => $value) {
                    

                    $res=new Country;
                    $res->id=$value->id;
                    $res->name=$value->name;
                    $res->iso3=$value->iso3;
                    $res->iso2=$value->iso2;
                    $res->phone_code=$value->phone_code;
                    $res->capital=$value->capital;
                    $res->currency=$value->currency;
                    $res->currency_symbol=$value->currency_symbol;
                    $res->native=$value->native;
                    $res->region=$value->region;
                    $res->subregion=$value->subregion;
                    $res->latitude=$value->latitude;
                    $res->longitude=$value->longitude;
                    $res->save();

                    echo $res->name .' Country Saved Successfully <br>';


          }



                         $all_state=json_decode($this->state);
                         foreach ($all_state as $ke => $val) {
                              
                              $re=new State;
                              $re->id=$val->id;
                              $re->name=$val->name;
                              $re->country_id=$val->country_id;
                              $re->country_code=$val->country_code;
                              $re->state_code=$val->state_code;
                              $re->latitude=$val->latitude;
                              $re->longitude=$val->longitude;
                              $re->save();
                              echo $re->name .' State Saved Successfully <br>';

                         }
                              $all_city=json_decode($this->city);
                                   foreach ($all_city as $k => $v) {
                                        $r=new City;
                                        $r->id=$v->id;
                                        $r->name=$v->name;
                                        $r->country_id=$v->country_id;
                                        $r->country_code=$v->country_code;
                                        $r->state_id=$v->state_id;
                                        $r->state_code=$v->state_code;
                                        $r->latitude=$v->latitude;
                                        $r->longitude=$v->longitude;
                                        $r->save();

                                        echo $r->name .' City Saved Successfully <br>';
                                   }
     }


     public function removeAll()
     {
          
          Country::truncate();
          State::truncate();
          City::truncate();

          return 'Country State City Data Removed';
     }

}
