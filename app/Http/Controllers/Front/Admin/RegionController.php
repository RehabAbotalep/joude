<?php

namespace App\Http\Controllers\Front\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{   use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cities     = City::all();
        $language   = app()->getLocale();
        $cities     = $this->toLang($language,$cities,false);

        $regions = Region::all();

        $regions = $this->toLang($language,$regions,false);
        foreach($regions as $region ){
            $city = $region->city;

            $city = $this->toLang($language,$city,true);
        }

    
        return view('admin.regions.index',compact('cities','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en'  => 'required|regex:/^[\pL\s\-]+$/u',
            'name_ar'  => 'required|regex:/\p{Arabic}/u',
            'city_id'  => 'required|integer',
        ]);
        //return $request->all();
        Region::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $language   = app()->getLocale();
        $cities = $this->toLang($language,$cities,false);

        $region = Region::find($id);
    
        return view('admin.regions.edit',compact('cities','region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_en'  => 'regex:/^[\pL\s\-]+$/u',
            'name_ar'  => 'regex:/\p{Arabic}/u',
            'city_id'  => 'integer',
        ]);
        $region = Region::find($id);
        $region->update($request->all());
        return redirect(route('region.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        return back();
    }
}
