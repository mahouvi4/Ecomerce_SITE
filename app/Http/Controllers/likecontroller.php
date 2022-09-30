<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;

class likecontroller extends Controller
{
     public function add_like($id){
        if(session('info_user')){
            $id_user = session('info_user')[0]->id;
            
            $add_like = new like();
            $add_like->id_user = $id_user;
            $add_like->id_produit = $id;
            $add_like->qt_like = 1;
            $add_like->save();
            return response()->json(['status'=>200, 'message'=>'Merci davoir aimé notre article!!']);
      }
        return response()->json(['status'=>300, 'message'=>'success']);

     }

      public function count_like(){
         if(session('info_user')){
            $count_like = like::where('id_user',session('info_user')[0]->id)->count();
            return response()->json($count_like);

         }
      }

      public function show_list_like(){
         if(session('info_user')){
            $show_list_like = like::where('id_user',session('info_user')[0]->id)->get();
            return view('temp.show_like',['show_list_like'=>$show_list_like]);
         }
      }
       public function delete_like($id){
        if(session('info_user'))
        like::find($id)->delete();
       }
}
