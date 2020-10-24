<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\LangData;
use App\Region;
use App\Store;
use App\Voucher;
use Illuminate\Http\Request;

class StoreController extends Controller
{ use LangData,ApiResponse;

    //get all stores that have discount
    public function getAllStores(Request $request){
      $language  = ($request->header("X-Language")) ?? 'en';

      $stores    = Store::where('discount', '!=' , 0)->where('is_favourite',1)->get();
      $stores    = $this->toLang($language,$stores,false);

      return $this->dataResponse($stores,null,200);
    }

    //get all categories
    public function getAllCategories(Request $request){
      $language  = ($request->header("X-Language")) ?? 'en';

      $categories = Category::all();
      
      $categories = $this->toLang($language,$categories,false);

      return $this->dataResponse($categories,null,200);
    }


     //get all Stores that have Vouchers related to specific category
    public function vouchers(Request $request,$category_id){
      $language = ($request->header("X-Language")) ?? 'en';
      $stores = Store::with('vouchers')
                        ->where('category_id',$category_id)
                        ->where('discount',0)
                        ->where('is_favourite',1)
                        ->get();

      $stores  = $this->toLang($language,$stores,false);

      foreach ($stores as $store) {
         foreach ($store->vouchers as $voucher) {
            $voucher = $this->toLang($language,$voucher,true);
         }
      }
      return $this->dataResponse($stores,null,200);
      }
    

     //get Stores by Category id city id and region id
     //I know that it is a Spagety Code :)
    public function getCategoryStores(Request $request){
        $language  = ($request->header("X-Language")) ?? 'en';

        $category = Category::find($request->category_id);
        if( !$category ){
          return $this->errorResponse(trans('messages.category.notfound'),null,404);
        }
         
        $city   = City::find($request->city_id);

        if( !$city ){
          return $this->errorResponse('This City Not Found!',null,404);
        }
         // it is a client ask to search with city only or city and region
        if( !$request->region_id ){
          $city   = City::with('stores')->where('id',$request->city_id)->first();
          $stores = $city->stores()->where('category_id',$request->category_id)
                                    ->where('discount', '!=' , '0')
                                    ->get();
          $stores = $this->toLang($language,$stores,false);      
          return $this->dataResponse($stores,null,200);

        }

        $region = Region::where('id',$request->region_id)->where('city_id',$request->city_id)->first();
        if( !$region ){
            return $this->errorResponse(trans('messages.region.notfound'),null,404);
        }
        $branches = Branch::where('region_id',$request->region_id)->get();

        $storeResult = [];
        foreach( $branches as $key => $branch ){
          $stores = $branch->store()->where('category_id',$request->category_id)
                                    ->where('discount', '!=' , '0')
                                    ->get();
          $stores = $this->toLang($language,$stores,false);
          foreach ($stores as $singleStore) {
          $storeResult[$key] = $singleStore;

          }
        }
         // To ensure that no repeated stores and return these only values in array
        $uiquedStores = array_values(array_unique($storeResult));
        
        return $this->dataResponse($uiquedStores,null,200);
      }

       
    //get Store Branches by only store id
    public function storesBranches(Request $request,$store_id){
      $language = ($request->header("X-Language")) ?? 'en';
      $store = Store::where('id',$store_id)->first();

       if( !$store ){
        return $this->errorResponse(trans('messages.store.notfound'),null,404);
      }

      $cities = $store->cities()->get();
      
      $cities = $this->toLang( $language, $cities, false);
      $cities = $cities->map(function ($item) use($store_id,$language) {
            $branches = Branch::where('store_id',$store_id)
                                 ->where('city_id',$item->id)->get();
            $branches = $this->toLang( $language, $branches, false);
            //To get region name and translate it
            foreach ($branches as $branch) {
               $region = $branch->region;
               $region = $this->toLang( $language, $region, true);
            }
            $item['branches'] = $branches;
            return $item;
        });
      
      return $this->dataResponse($cities,null,200);
    }

    //get Store Branches by strore id and city id
    public function branches(Request $request){
      $language = ($request->header("X-Language")) ?? 'en';
      $store = Store::where('id',$request->store_id)->first();

       if( !$store ){
        return $this->errorResponse(trans('messages.store.notfound'),null,404);
      }

      $city = City::where('id',$request->city_id)->first();

      if( !$city ){
        return $this->errorResponse(trans('messages.city.notfound'),null,404);
      }

      $branches = Branch::where('city_id',$request->city_id)
                        ->where('store_id',$request->store_id)
                        ->with('region')
                        ->get();
      $branches = $this->toLang( $language, $branches, false);

      $branches = $branches->map(function ($item) use($language) {
            
          $region = $item->region;
          $region = $this->toLang( $language, $region, true);
            return $item;
        });
      return $this->dataResponse($branches,null,200);

    }


    //get Vouchers by Category id city id and region id
    public function getCategoryVouchers(Request $request){
        $language  = ($request->header("X-Language")) ?? 'en';

        $category = Category::find($request->category_id);
        if( !$category ){
          return $this->errorResponse(trans('messages.category.notfound'),null,404);
        }
         
        $city   = City::find($request->city_id);

        if( !$city ){
          return $this->errorResponse(trans('messages.city.notfound'),null,404);
        }
         // it is a client ask to search with city only or city and region
        if( !$request->region_id ){
          $city   = City::where('id',$request->city_id)->first();
          $stores = $city->stores()->where('category_id',$request->category_id)
                                    ->where('discount', '=' , '0')
                                    ->get();
          $stores = $this->toLang( $language, $stores, false);
          $stores = $stores->map(function ($item) use($language) {
            $vouchers = $item->vouchers;
            $vouchers = $this->toLang( $language, $vouchers, false);
            return $item;

        });
          return $this->dataResponse($stores,null,200);

        }

        $region = Region::where('id',$request->region_id)->where('city_id',$request->city_id)->first();
        if( !$region ){
            return $this->errorResponse(trans('messages.region.notfound'),null,404);
        }
        $branches = Branch::where('region_id',$request->region_id)->get();

        $storeResult = [];
        foreach( $branches as $key => $branch ){
          $stores = $branch->store()->where('category_id',$request->category_id)
                                    ->where('discount', '=' , '0')
                                    ->get();
          $stores = $this->toLang($language,$stores,false);
          foreach ($stores as $singleStore) {

            $vouchers = $singleStore->vouchers;
            $vouchers = $this->toLang($language,$vouchers,false);
            $storeResult[$key] = $singleStore;

          }
        }
         // To ensure that no repeated stores and return these only values in array
        $uiquedStores = array_values(array_unique($storeResult));
        
        return $this->dataResponse($uiquedStores,null,200);
      }
}
