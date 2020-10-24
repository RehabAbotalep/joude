<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\LangData;
use App\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{  
   use LangData,ApiResponse;

    //get all cities with it's regions
      public function citiesRegions(Request $request){
         $language = ($request->header("X-Language")) ?? 'en';

         $citiesRegions  = City::with('regions')->get();
         $citiesRegions  = $this->toLang($language,$citiesRegions,false);

         foreach ($citiesRegions as $city) {
            $regions = $city->regions;
            $regions  = $this->toLang($language,$regions,false);
         }

         return $this->dataResponse($citiesRegions,null,200);
         
      }

      //get all Cities
      public function getCities(Request $request){
         $language = ($request->header("X-Language")) ?? 'en';
         $cities   = City::get();

         $cities   = $this->toLang($language,$cities,false);

         return $this->dataResponse($cities,null,200);
      }

      //get all regions according to city id
      public function getRegions(Request $request,$city_id){
         $language  = ($request->header("X-Language")) ?? 'en';
         
         $city      = City::find($city_id);
         
         if( !$city ){
            return $this->errorResponse('This City Not Found!',null,404);
         }

         $regions   = Region::where('city_id',$city_id)->get();

         $regions   = $this->toLang($language,$regions,false);

         return $this->dataResponse($regions,null,200);

      }
}
