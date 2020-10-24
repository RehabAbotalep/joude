<?php

namespace App\Http\Controllers\Front\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use App\Store;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{   use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $stores     = Store::all();
        $language   = app()->getLocale();
        $stores     = $this->toLang($language,$stores,false);

        return view('admin.vouchers.create',compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
            'name_en'         => 'required',
            'name_ar'         => 'required|regex:/\p{Arabic}/u',
            'store_id'        => 'required',
        ]);


        $store   = Store::find($request->store_id);
        $input   = $request->all();
        $input['store_id'] = $request->store_id;
        $voucher = Voucher::create($input);
        if($voucher){
            $store->discount = 0;
            $store->save();
        }
        return redirect(route('store.index'));
        
    }

    public function getVoucher($store_id){
        $vouchers   = Voucher::where('store_id',$store_id)->get();
        $language   = app()->getLocale();
        $vouchers   = $this->toLang($language,$vouchers,false);
        return view('admin.vouchers.index',compact('vouchers'));
    }


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
    public function delete($id)
    {
        $voucher = Voucher::find($id)->delete();
        return back();
    }
}
