<?php

namespace App\Http\Controllers\Front\Admin;

use App\Card;
use App\Http\Controllers\Controller;
use App\Http\Traits\LangData;
use Illuminate\Http\Request;

class CardController extends Controller
{   use LangData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $date     = date('Y-m-d'); 
        $cards    = Card::where('expire_date','>=',$date)->get();
        $language = app()->getLocale();
        foreach ($cards as $card) {
            $type = $card->type;
            $type = $this->toLang($language,$type,true);
        }
        
        
        return view('admin.cards.index',compact('cards'));
    }

    public function destroy($id)
    {
        $card = Card::find($id)->delete();
        return back();
    }

     public function show($id)
    {
        
    }


    ///Active Card
    public function active($id)
    {
        $card = Card::find($id);
        if( $card ){
            $card->status = 1;
            $card->save();
        }
        return back();
    }

    ///Deactive Card
    public function deactive($id)
    {
        $card = Card::find($id);
        if( $card ){
            $card->status = 0;
            $card->save();
        }
        return back();
    }

}
