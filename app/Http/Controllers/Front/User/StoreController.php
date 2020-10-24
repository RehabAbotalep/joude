<?php

namespace App\Http\Controllers\Front\User;

use App\Branch;
use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\Setting;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{	use LangData;
    //get Vouchers Views
    public function vouchers(Request $request){
    	$language   = app()->getLocale();

    	$categories = Category::all();
        $categories = $this->toLang($language,$categories,false);

        $cities = City::all();
        $cities = $this->toLang($language,$cities,false);
        $stores     = new Store;
        //Get All stores
        $stores     = Store::where('discount',0);

        //Filter By Category
        if( !empty($request->category_id) ){
            $stores    = $stores->where('category_id',$request->category_id);

        }
        //Filter by city
        if( !empty($request->city_id) ){
            $stores    = $stores->whereHas('cities',function($query)use($request){
                $query->where('city_id',$request->city_id);
            }); 
        }
        //Filter by region
        if( !empty($request->region_id) ){
            $branches = Branch::where('region_id',$request->region_id)->pluck('store_id')->toArray();
            
            $store_ids = array_values(array_unique($branches));
            $stores    = $stores->whereIn('id',$store_ids);
        }
        $stores  = $stores->with('vouchers')->get();
        $stores  = $this->toLang($language,$stores,false);
        foreach ( $stores as $store ) {
           $category = $store->category;
           $category = $this->toLang($language,$category,true);
           foreach ($store->vouchers as $voucher) {
              $voucher = $this->toLang($language,$voucher,true);
            }
        }
        //return($stores);
        return view('user.stores.voucher',compact('categories','stores','cities'));
    }

    //get Store Details
    public function storeDetails($store_id){
    	$language = app()->getLocale();

    	$store    = Store::find($store_id);
    	$phone    = Setting::value('phone');
    	$stores   = $this->toLang($language,$store,true);

    	$branches = Branch::where('store_id',$store->id)->get();
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
        //return $cities;
    	return view('user.stores.storedetails',compact('store','phone','cities'));
    }
}
