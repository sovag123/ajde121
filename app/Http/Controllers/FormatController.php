<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $formati=Format::all();
        return view('format.index',['formati'=>$formati]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('format.create');
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
            'nazivFormat' => 'required'
        ]);
        $format = new Format();
        $format->Naziv=$request->nazivFormat;
        $format=$format->save();
        if($format){
            return redirect()->route('format.index')->with('success','Format je uspješno dodat');
        }
        else{
            return redirect()->route('format.index')->with('fail','Format nije uspješno dodat'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function show(Format $format)
    {
        $format = Format::find($format->id);
        return view('format.show',['format'=>$format]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function edit(Format $format)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Format $format)
    {
        $request->validate([
            'nazivFormatEdit'=>'required'
        ]);
        $azuzirano=Format::where('Id',$format->id)->update([
                'Naziv'=>$request->nazivFormatEdit
        ]);
        if($azuzirano){
            return redirect()->route('format.index')->with('success','Format je uspješno azuriran');
        }
        else{
            return redirect()->route('format.index')->with('fail','Izdavac nije uspješno azuriran'); 
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function destroy(Format $format)
    {
        $format=Format::where('Id',$format->id);
        $obrisi=$format->delete();
        if($obrisi){
            return redirect()->route('format.index')->with('success','format je uspješno obrisan');
          }else{
            return redirect()->route('format.index')->with('fail','format nije uspješno obrisan'); 
          }
    }
}
