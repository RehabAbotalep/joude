<?php

namespace App\Http\Controllers\Front\Admin;

use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Traits\AdminImageUpload;
use App\Http\Traits\LangData;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{   use LangData,AdminImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $stores    = Store::all();
        $language  = app()->getLocale();
        $stores    = $this->toLang($language,$stores,false);
        $stores    = $stores->map(function($item)use($language){
            $category = $item->category;
            $category = $this->toLang($language,$category,true);
            return $item;
        });
        return view('admin.stores.index',compact('stores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::all();
        $language   = app()->getLocale();
        $categories = $this->toLang($language,$categories,false);
        $cities     = City::all();
        $cities     = $this->toLang($language,$cities,false);
        return view('admin.stores.create',compact('categories','cities'));
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
            'name_en'         => 'required|regex:/^[\pL\s\-]+$/u',
            'name_ar'         => 'required|regex:/\p{Arabic}/u',
            'category_id'     => 'required',
            'cities'          => 'required',
            'image'           => 'required|image|mimes:jpg,jpeg,svg,png|max:3000',
        ]);
        $input = $request->except('cities');
        $input['image']       = $this->upload($request->image);
        $input['category_id'] = $request->category_id;
        $store = Store::create($input);
        if($store){
            $store->cities()->attach($request->cities);
        }
        return redirect(route('store.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store      = Store::find($id);
        $categories = Category::all();
        $language   = app()->getLocale();
        $categories = $this->toLang($language,$categories,false);

        $cities     = City::all();
        $cities     = $this->toLang($language,$cities,false);

        return view('admin.stores.edit',compact('store','categories','cities'));
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
        $store = Store::find($id);
        $this->validate($request,[
            'name_en'         => 'regex:/^[\pL\s\-]+$/u',
            'name_ar'         => 'regex:/\p{Arabic}/u',
            'image'           => 'image|mimes:jpg,jpeg,svg,png|max:3000',
        ]);
        $oldImage = $store->image;
        $input    = $request->except('cities');
        if($request->has('image')){
            $input['image'] = $this->upload($request->image);
            $this->deleteImage($oldImage);
        }

        $input['is_favourite'] = ($request->is_favourite) ?? 0;
        $input['category_id']  = $request->category_id;
        $store->update($input);
        $store->cities()->sync($request->cities);
        return redirect(route('store.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store   = Store::findOrFail($id);
        $image   = $store->image;
        $store->delete();
        $this->deleteImage($image);
        return back();
    }

}
