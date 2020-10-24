<?php

namespace App\Http\Controllers\Front\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use Illuminate\Http\Request;

class CityController extends Controller
{   use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cities   = City::all();
        $language = app()->getLocale();
        $cities   = $this->toLang($language,$cities,false);

        $cities   = $cities->map(function($item) use($language){
            $regions = $item->regions;
            $regions  = $this->toLang($language,$regions,false);
            return $item;

        });
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name_en'  => 'required|unique:cities',
            'name_ar'  => 'required|unique:cities',
        ]);

        $input          = $request->all();
        city::create($input);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        return back();
    }
}
