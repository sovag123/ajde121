<?php

namespace App\Http\Controllers;

use App\Models\Pismo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class PismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pisma = Pismo::all();

        // load the view and pass the sharks
        return View::make('pages.pismo.index')
            ->with('pisma', $pisma);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('pages.pismo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pismo = new Pismo();
        $pismo->Naziv = $request->post('nazivPismo');
        $pismo->save();

        return Redirect::to('pismo');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function show(Pismo $pismo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function edit(Pismo $pismo)
    {

        // load the view and pass the sharks
        return View::make('pages.pismo.edit')
            ->with('pismo', $pismo);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pismo $pismo)
    {
        $pismo->Naziv = $request->post('nazivPismo');
        $pismo->update();
        return Redirect::to('pismo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pismo $pismo)
    {
        $pismo->delete();
        return Redirect::to('pismo');
    }
}
