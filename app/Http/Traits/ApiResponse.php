<?php 
namespace App\Http\Traits;


trait ApiResponse{

	public function fullDataResponse( $token,$data,$message,$code ){

		$array = [
			'token'   => $token,
			'data'    => $data,
			'message' => $message,
			'status'  => in_array($code, $this->successCode()) ?true : false

		];
		return response($array,$code);
	}


	public function dataResponse($data = null,$message,$code){
		$array = [
			'data'    => $data,
			'message' => $message,
			'status' => in_array($code, $this->successCode()) ?true : false

		];
		return response($array,$code);

	}

	public function errorResponse($message,$errors,$code){
		$array = [
			'message' => $message,
			'errors'  => $errors,
			'status' => in_array($code, $this->successCode()) ?true : false

		];
		return response($array,$code);

	}

	public function successCode(){
		return [ 200 , 201, 202 ];
	}

}









 ?>