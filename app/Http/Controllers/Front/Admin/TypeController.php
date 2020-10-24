<?php

namespace App\Http\Controllers\Front\Admin;

use App\CardType;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use Illuminate\Http\Request;

class TypeController extends Controller
{   use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cardTypes = CardType::all();
        $language  = app()->getLocale();
        $cardTypes = $this->toLang($language,$cardTypes,false);
        return view('admin.cardTypes.types',compact('cardTypes'));
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
            'name_en'      => 'required',
            'name_ar'      => 'required|regex:/\p{Arabic}/u',
            'price'        => 'required',
            'month_number' => 'required',
        ]);

        $input = $request->all();
        CardType::create($input);
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
        $type = CardType::find($id);
        return view('admin.cardTypes.edit',compact('type'));
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
        $type = CardType::find($id);
        $type->update($request->all());
        return redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CardType::find($id)->delete();
        return back();
    }
}
