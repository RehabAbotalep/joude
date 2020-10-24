<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


trait AdminImageUpload{

	public function upload($image){

		$extension = request()->file("image")->getClientOriginalExtension();
		$name      = request()->file("image")->getClientOriginalName();
		$name2     = explode('.',$name);
		$finalName = $name2[0];
		
		$slug      = Str::slug($finalName, '-');
		$image     =  $slug . time() ."." . $extension;
		$path      =  "/images/" . $image;

       	$uploadedSuccess = request()->image->move(public_path('images'), $image);

       	if($uploadedSuccess){
       		return $path;
       	}else{
       		return false;
       	}
        
	}

	public function deleteImage($image){
		$image_path = public_path().'/'.$image;
		if(File::exists($image_path)) {
    		File::delete($image_path);
		}
	}


}


?>