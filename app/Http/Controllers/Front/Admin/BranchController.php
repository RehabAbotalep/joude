<?php

namespace App\Http\Controllers\front\Admin;

use App\Branch;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\Store;
use App\Region;
use Illuminate\Http\Request;


class BranchController extends Controller
{	use LangData;


    public function viewBranch(){
    	$stores     = Store::all();
        $language   = app()->getLocale();
        $stores     = $this->toLang($language,$stores,false);

    	return view ('admin.branches.create',compact('stores','map'));
    }

    //Ajax request to view Cities according to specified Store
    function cities( Request $request ){
    	$language   = app()->getLocale();
    	if (!$request->store_id) {
        	$input = '<option value="">'.trans('messages.pleaseSelect').'</option>';
    	}else {
		    $input = '';
		    $store  = Store::where('id',$request->store_id)->first();
		    $cities = $store->cities()->get();
		    $cities = $this->toLang($language,$cities,false);
		    foreach ($cities as $city) {
		        $input .= '<option value="'.$city->id.'">'.$city->name.'</option>';
		    }
		}
	    return response()->json(['input' => $input]);
	}


    //Ajax request to view regions according to specified city
    function regions( Request $request ){
    	$language   = app()->getLocale();
    	if (!$request->city_id) {
        	$html = '<option value="">'.trans('messages.pleaseSelect').'</option>';
    	}else {
		    $html = '';
		    $regions = region::where('city_id', $request->city_id)->get();
		    $regions = $this->toLang($language,$regions,false);
		    foreach ($regions as $region) {
		        $html .= '<option value="'.$region->id.'">'.$region->name.'</option>';
		    }
		}
	    

	    return response()->json(['html' => $html]);
	}


	//Add Branch
	public function addBranch(Request $request){
		$this->validate($request,[
            'address_en'  => 'required',
            'address_ar'  => 'regex:/\p{Arabic}/u|required',
            'phone'       => 'numeric|required',
            'city_id'     => 'required|exists:cities,id',
            'store_id'    => 'required|exists:stores,id'

        ]);

        $branch = Branch::create($request->all());
        return back()->with('success',trans('messages.created.success'));
	}

	//get store Branches 
	public function getBranches($store_id){
		$language   = app()->getLocale();

		$branches = Branch::where('store_id',$store_id)->get();
		$branches = $this->toLang($language,$branches,false);
		
		$branches = $branches->map(function($item) use($language){
			$city = $item->city;
			$city = $this->toLang($language,$city,true);

			$region = $item->region;
			$region = $this->toLang($language,$region,true);
			return $item;
		});
		return view('admin.branches.index',compact('branches'));

	}

	public function edit($id){
		$language = app()->getLocale();
		$stores   = Store::all();
        $stores   = $this->toLang($language,$stores,false);

        $cities   = City::all();
        $cities   = $this->toLang($language,$cities,false);

        $branch   = Branch::find($id);
        return view('admin.branches.edit',compact('stores','cities','branch'));  
	}


	public function update($id,Request $request){
		$branch = Branch::find($id);
		$this->validate($request,[
            'address_ar'  => 'regex:/\p{Arabic}/u',
            'phone'       => 'numeric',
        ]);

		$branch->update($request->all());
		return back()->with('success',trans('messages.updated.success'));

	}

	public function destroy($id){
		$branch = Branch::find($id);

		$branch->delete();
		return back();

	}
}
