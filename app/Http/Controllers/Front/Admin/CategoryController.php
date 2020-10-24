<?php

namespace App\Http\Controllers\Front\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use Illuminate\Http\Request;
use App\Http\Traits\AdminImageUpload;

class CategoryController extends Controller
{	use LangData,AdminImageUpload;

    public function index(){
    	$categories = Category::all();
    	$language   = app()->getLocale();
    	$categories = $this->toLang($language,$categories,false);
    	return view('admin.categories.index',compact('categories'));
    }

    public function create(){
    }


    public function edit($id){
        $category = Category::find($id);

        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $this->validate($request,[
            'name_en'  => 'regex:/^[\pL\s\-]+$/u|unique:categories,name_en,' . $category->id,
            'name_ar'  => 'regex:/\p{Arabic}/u|unique:categories,name_ar,' . $category->id,
            'image'    => 'image|mimes:jpg,jpeg,svg,png|max:3000',
        ]);
        $oldImage = $category->image;

        if($request->has('image')){
            $category->image = $this->upload($request->image);
            $this->deleteImage($oldImage);
        }

        $category->name_en = $request->name_en;
        $category->name_ar = $request->name_ar;
        $category->save();
        return redirect(route('category.index'));
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name_en'  => 'required|unique:categories|regex:/^[\pL\s\-]+$/u',
            'name_ar'  => 'required|unique:categories|regex:/\p{Arabic}/u',
            'image'    => 'image|mimes:jpg,jpeg,svg,png|max:3000',
        ]);

        $input          = $request->all();
        if($request->has('image')){
            $input['image'] = $this->upload($request->image);
        }
        
        Category::create($input);
        return redirect(route('category.index'));
    }

    public function destroy($id){

        $category   = Category::findOrFail($id);
        $image      = $category->image;
        $category->delete();
        $this->deleteImage($image);
        return back();


    }
     
}
