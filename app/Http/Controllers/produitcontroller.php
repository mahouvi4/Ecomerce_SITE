<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\couleur_produit;
use App\Models\image_produit;
use App\Models\produit;
use Illuminate\Http\Request;

class produitcontroller extends Controller
{
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
    {
       $couleur = couleur_produit::all();
        $cat=categorie::all();
        return view('produit.create',['couleur'=>$couleur,'cat'=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $produ = new produit();
          $produ->reference = $request->reference;
          $produ->nom = $request->nom;
          $produ->prix = $request->prix;
          $produ->description = $request->description;
          $produ->desconte = $request->desconte;
          $produ->stock = $request->stock;
          $produ->statut = $request->statut==TRUE ? '1':'0';
          $produ->popularite = $request->popularite==TRUE ? '1':'0';
          $produ->id_categorie = $request->categorie;

               if($request->hasFile('photo')){
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('produit',$name);
                $produ->photo = $name;
               }
          $produ->save();
          
                if($request->hasFile('photos')){
                    foreach ($request->file('photos') as $key=>$files) {
                        $names=time().'.'.$key.$files->extension();
                        $files->move('produit',$names);
                          $riko = new image_produit();
                          $riko->id_produit=$produ->id;
                          $riko->photos=$names;
                          $riko->save();
                    }
                }

                return response()->json(['status'=>200,'message'=>'Produit enregistré avec sucess!!!']);

    }

    

    
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show_pro = produit::all();
        return view('produit.show_produit',['show_pro'=>$show_pro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_pro = produit::find($id);
        $catex = categorie::all();
        return view('produit.edit_pro',['edit_pro'=>$edit_pro,'catex'=>$catex]);
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
        $produ = produit::find($id);
          $produ->reference=$request->reference;
          $produ->nom = $request->nom;
          $produ->prix = $request->prix;
          $produ->description = $request->description;
          $produ->desconte = $request->desconte;
          $produ->stock = $request->stock;
          $produ->statut = $request->statut==TRUE ? '1':'0';
          $produ->popularite = $request->popularite==TRUE ? '1':'0';
          $produ->id_categorie = $request->categorie;

               if($request->hasFile('photo')){
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('produit',$name);
                $produ->photo = $name;
               }
          $produ->update();
          
                if($request->hasFile('photos')){
                    foreach ($request->file('photos') as $key=>$files) {
                        $names=time().'.'.$key.$files->extension();
                        $files->move('produit',$names);
                          $riko = new image_produit();
                          $riko->id_produit=$produ->id;
                          $riko->photos=$names;
                          $riko->save();
                    }
                }

                return response()->json(['status'=>200,'message'=>'Produit Modifié avec sucess!!!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produit::find($id)->delete();
    }

    public function delete_gallery($id){
        if($id){
            image_produit::find($id)->delete();
        }
        
    }

    public function delete_multiplo(Request $request){
         produit::where('id',explode(',',$request->stock_data))->delete();
    } 

    public function restore_pro(){
        produit::withTrashed()->restore();
    }
 
    // TEMPLATE

    public function home_template(){
        $show_produit = produit::all();
        return view('temp.home_template',['show_produit'=>$show_produit]);
    } 

    public function description($id){
        
        $descript = produit::find($id);
        $categ = produit::where('id_categorie',$descript->id_categorie)->get();
        return view('temp.description',['descript'=>$descript,'categ'=>$categ]);
    }

    public function recherche_x(){
        $tablo = [];
       //$recherche =  produit::select('nom')->where('status','1')->get();
       $recherche =  produit::all();
          foreach($recherche as $item){
            $tablo[] = $item['nom'];
            
          }
          return response()->json($tablo);
    }
  
}
