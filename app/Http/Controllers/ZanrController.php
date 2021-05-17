<?php

namespace App\Http\Controllers;

use App\Models\Zanr;
use Illuminate\Http\Request;

class ZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zanrovi=Zanr::all();
        return view('zanr.index',['zanrovi'=>$zanrovi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zanr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nazivZanr'=>'required'
        ]);
        $zanr=new Zanr();
        $zanr->Naziv=$request->nazivZanr;
        $zanr=$zanr->save();
        if($zanr){
          return redirect()->route('zanr.index')->with('success','zanrovi je uspješno dodat');
        }else{
          return redirect()->route('zanr.index')->with('fail','zanrovi nije uspješno dodat'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function show(Zanr $zanr)
    {
        $zanr=Zanr::find($zanr->id);
        return view('zanr.show',["zanr"=>$zanr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function edit(Zanr $zanr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zanr $zanr)
    {
        $request->validate([
            'nazivZanr'=>'required'
           ]);
           $azurirano=Zanr::where('id',$zanr->id)->update([
               'Naziv'=>$request->nazivZanr
           ]);
           if($azurirano){
               return redirect()->route('zanr.index')->with('success','zanr je uspješno azuriran');
             }else{
               return redirect()->route('zanr.index')->with('fail','zanr nije uspješno azuriran'); 
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zanr $zanr)
    {
        $zanr=Zanr::where('id',$zanr->id);
        $obrisi=$zanr->delete();
        if($obrisi){
            return redirect()->route('zanr.index')->with('success','zanrovi je uspješno obrisan');
          }else{
            return redirect()->route('zanr.index')->with('fail','zanrovi nije uspješno obrisan'); 
          }
    }
}
