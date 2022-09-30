<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\panier;
use App\Models\produit;
use Illuminate\Http\Request;

class paniercontroller extends Controller
{
    public function add_panier($id){
        if(session('info_user')){
            $id_user = session('info_user')[0]->id;
            $add_panier = new panier();
            $add_panier->id_user=$id_user;
            $add_panier->id_produit=$id;
            $add_panier->qt=1;
            $add_panier->save();
           like::where('id_produit',$id)->where('id_user',$id_user)->delete();
         
            return response()->json(['status'=>200,'message'=>'Vous venez dajouter un produit au panier!!']);
        }else{
            return response()->json(['status'=>300,'message'=>'veillez vous connecter!!']);

        }
    }

    public function show_cart(){
        if(session('info_user')){
            $show_cart = panier::where('id_user',session('info_user')[0]->id)->get();
            return view('temp.panier1',['show_cart'=>$show_cart]);
        }
    }

    public function count_cart(){
        if(session('info_user')){
            $count_cart = panier::where('id_user',session('info_user')[0]->id)->count();
            return response()->json($count_cart);
        }
    }

    public function show_small_cart(){
        if(session('info_user')){
            $table=[];
            $xx_small_cart = panier::where('id_user',session('info_user')[0]->id)->get();
               foreach ($xx_small_cart as $item) {
                $produit = produit::find($item->id_produit);
                $table[] = ['data_pano'=>$item, 'data_prod'=>$produit];

                    }

               return response()->json($table);

        }
    }

     public function total_small_cart(){
        if(session('info_user')){
            $total_global_small_cart = 0;
           $show_small_cart = panier::where('id_user',session('info_user')[0]->id)->get();
              foreach ($show_small_cart as $item) {
                 $produit_total = produit::find($item->id_produit);
                 $total_global_small_cart+=$produit_total->prix*$item->qt;
              }
              return response()->json($total_global_small_cart);

        }
     }

     public function delete_produit_panier($id){
     
        panier::find($id)->delete();
     }

      public function update_qt_cart(Request $request){
      
        $update_qt = panier::find($request->id_panier);
        $update_qt->qt = $request->quantite;
        $update_qt->update();
        return response()->json(['status'=>200]);
        

      }

      public function mon_compte(){
          if(session('info_user')){
            $plus_info = panier::where('id_user',session('info_user')[0]->id);
            return view('temp.mon_compte',['plus_info'=>$plus_info]);
          }
      }

      public function checkout_x(){
        if(session('info_user')){
          $checkout = panier::where('id_user',session('info_user')[0]->id)->get();
          return view('temp.checkout',['checkout'=>$checkout]);
        }
    }

    public function product_category(){
        return view('temp.product_category');
    }

    
}
