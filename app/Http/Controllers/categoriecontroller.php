<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;


class categoriecontroller extends Controller
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
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $store_cat = new categorie();
       $store_cat->reference_cat = $request->reference_cat;
       $store_cat->name_cat = $request->name_cat;
       $store_cat->desconte_cat = $request->desconte_cat;
       if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move('categorie',$name);
            $store_cat->photo = $name;
            }
            $store_cat->save();
            return response()->json(['status'=>200,'message'=>'Produit enregistré avec succes!!!']);
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show_cat = categorie::all();
        return view('categorie.show_cat',['show_cat'=>$show_cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edito = categorie::find($id);
        return view('categorie.edit',['edito'=>$edito]);
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
        $update = categorie::find($id);
        $update ->reference_cat = $request->reference_cat;
        $update ->name_cat = $request->name_cat;
        $update ->desconte_cat = $request->desconte_cat;
        if($request->hasFile('photo')){
             $file = $request->file('photo');
             $name = time().'.'.$file->getClientOriginalExtension();
             $file->move('categorie',$name);
             $update ->photo = $name;
             }
             $update ->update();
             return response()->json(['status'=>200,'message'=>'Produit modifié avec succes!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorie::find($id)->delete();
    
    }

    public function restore(){
       categorie::withTrashed()->restore();
    }

    public function delete_multiple(Request $request){
      categorie::where('id',explode(',',$request->info))->delete();
    }
}
