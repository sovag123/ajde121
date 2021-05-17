<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use Image;

class KategorijaController extends Controller
{
    public function index(){
        $kategorije= Kategorija::all(); 
        return view('kategorije.index', ['kategorije'=>$kategorije]);
    }
    public function create(){
        return view('kategorije.create');
    }
    public function store(Request $request){
        
       

        if($request->file('ikonica')){
            $file = $request->file('ikonica');
            $path = "storage/slika/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slike/slike-kategorija" , $file->getClientOriginalName());
        }

        $kategorije = new Kategorija();
        $kategorije->Naziv = $request->input('Naziv');
        $kategorije->Ikonica = $path;
        $kategorije->Opis = $request->input('Opis');
        $kategorije->save();
        return redirect('/settingsKategorije');
    //file

        /*$request->validate([
            'file' => 'required|mimes:png,jpg,svg|max:2048'
        ]);
    
            
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    
        $kategorije->Naziv = time().'_'.$request->file->getClientOriginalName();
        $kategorije->Ikonica = '/storage/' . $filePath;*/
            
    //endoffile



    }
    public function edit($id){
        $kategorije = Kategorija::find($id);
        return view('kategorije.edit', compact('kategorije'));

    }
    
    public function update($id, Request $request){

        $request->validate([
            'ikonica'=>'nullable|image|max:2048'
        ]);

        if($request->file('ikonica')){
            $file = $request->file('ikonica');
            $newpath = "storage/slika/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slike/slike-kategorija" , $file->getClientOriginalName());
        }

        $kategorije = Kategorija::where('id' , $id);
        $input = $request->all(); 
        $kategorije = Kategorija::find($id);
        $kategorije->Naziv = $input['Naziv'];
        
        $kategorije->Opis = $input['Opis'];
        $kategorije->save();
        return redirect('/settingsKategorije');


    }

    
        public function delete($id){
            $kategorije = Kategorija::find($id)->delete();
        
            return redirect('/settingsKategorije');
    }  
}
