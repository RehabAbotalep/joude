<?php

namespace App\Http\Controllers\Front\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use Illuminate\Http\Request;

class FaqController extends Controller
{   
    use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $faqs     = Faq::all();
        $language = app()->getLocale();
        $faqs     = $this->toLang($language,$faqs,false);
        return view('admin.faqs.index',compact('faqs'));
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
            'question_en'  => 'required',
            'question_ar'  => 'required',
            'answer_en'    => 'required',
            'answer_ar'    => 'required',
            
        ]);

        $input = $request->all();
        Faq::create($input);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $faq = Faq::find($id);
        return view('admin.faqs.edit',compact('faq'));
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
        $input = $request->all();
        $faq   = Faq::find($id);
        $faq->update($input);
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();
        return back();
    }
}
