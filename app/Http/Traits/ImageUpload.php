<?php
namespace App\Http\Traits;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
trait ImageUpload{

	public function upload(Request $request){
		$language  = ($request->header("X-Language")) ?? 'en';
		$id        = auth('api')->id();
		$user      = User::find($id);

		$validator = Validator::make($request->all(),[
				'image' =>'required|image|mimes:jpg,jpeg,svg,png|max:2048'
			]);

		if($validator->fails()){
			return response()->json([
				'Status'  => false,
				'message' => $validator->errors()->first()
				],422);
		}

		$extension = request()->file("image")->getClientOriginalExtension();
		$name      = request()->file("image")->getClientOriginalName();
		$name2     = explode('.',$name);
		$finalName = $name2[0];
		
		$slug      = Str::slug($finalName, '-');
		$image     =  $slug . time() ."." . $extension;
		$path      =  "/profile/" . $image;


		$oldImage = $user->image;
	    $user->image = $path;
		$user->save(); 
	    $image_path = public_path().'/'.$oldImage;

        if(File::exists($image_path)) {
    		File::delete($image_path);
		}

		
        request()->image->move(public_path('profile'), $image);

        return response()->json([
				'Status'  => true,
				'message' =>trans('messages.image.upload'),
				'path'    => $path
				],200);
	}


}


?>