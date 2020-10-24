<?php

namespace App\Http\Controllers\Front\User;

use App\Branch;
use App\Category;
use App\City;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\MobilePage;
use App\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{	
	use LangData;
    //Home Page
    public function index(){

    	$language   = app()->getLocale();

    	$categories = Category::all()->take(3);
        $categories = $this->toLang($language,$categories,false);

    	$about = MobilePage::where('slug','about_us')->first();
        $about = $this->toLang($language,$about,true);

        $faqs     = Faq::all();
        $faqs     = $this->toLang($language,$faqs,false);

        //get All stores
        $stores = Store::where('discount','!=',0)->where('is_favourite',1)->get();
        $stores = $this->toLang($language,$stores,false);
        foreach ($stores as $store) {
            $category = $store->category;
            $category = $this->toLang($language,$category,true);
        }

    	return view('user.index',compact('categories','about','stores','faqs'));
    }

    //Outlets View
    public function outletsIndex(Request $request){

        $language   = app()->getLocale();
        //dd($request->city_id);
        $stores     = new Store;
        //Get All stores
        $stores     = Store::where('discount','!=',0);

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

        $stores = $stores->get();
        $stores = $this->toLang($language,$stores,false);
        foreach ( $stores as $store ) {
           $category = $store->category;
           $category = $this->toLang($language,$category,true);
        }
        $cities = City::all();
        $cities     = $this->toLang($language,$cities,false);

        $categories = Category::all();
        $categories = $this->toLang($language,$categories,false);

        return view('user.outlets',compact('categories','stores','cities'));
    }

}
