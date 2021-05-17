<?php

namespace App\Http\Controllers;

use App\Models\Povez;
use Illuminate\Http\Request;

class PovezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $povezi=Povez::all();
        return view('povez.index',['povezi'=>$povezi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('povez.create');
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
            'nazivPovez'=>'required'
        ]);
        $povez=new Povez();
        $povez->Naziv=$request->nazivPovez;
        $povez=$povez->save();
        if($povez){
          return redirect()->route('povez.index')->with('success','povez je uspješno dodat');
        }else{
          return redirect()->route('povez.index')->with('fail','povez nije uspješno dodat'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function show(Povez $povez)
    {
        $povez=Povez::find($povez->id);
        return view('povez.show',["povez"=>$povez]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function edit(Povez $povez)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Povez $povez)
    {
        $request->validate([
            'nazivPovezEdit'=>'required'
           ]);
           $azurirano=Povez::where('Id',$povez->id)->update([
               'Naziv'=>$request->nazivPovezEdit
           ]);
           if($azurirano){
               return redirect()->route('povez.index')->with('success','povez je uspješno azuriran');
             }else{
               return redirect()->route('povez.index')->with('fail','povez nije uspješno azuriran'); 
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Povez $povez)
    {
        $povez=Povez::where('Id',$povez->id);
        $obrisi=$povez->delete();
        if($obrisi){
            return redirect()->route('povez.index')->with('success','povez je uspješno obrisan');
          }else{
            return redirect()->route('povez.index')->with('fail','povez nije uspješno obrisan'); 
          }
    }
}
