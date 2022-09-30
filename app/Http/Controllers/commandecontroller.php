<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\list_commande;
use App\Models\panier;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;

class commandecontroller extends Controller
{
    public function store_commande(Request $request){
      $commande = new commande();
      $commande->id_user = session('info_user')[0]->id;
      $commande->firstname = $request->firstname;
      $commande->name = $request->name;
      $commande->country = $request->country;
      $commande->rue = $request->rue;
      $commande->city = $request->city;
      $commande->state = $request->state;
      $commande->codzip = $request->codzip;
      $commande->tel = $request->tel;
      $commande->email = $request->email;
      $commande->codcommande = time().'DINX'.rand(1111,9999);
      $commande->adresscommande = $request->adresscommande;
      $commande->infosuplement = $request->infosuplement;
             
           $totalcommande = 0;
           $calcul = panier::where('id_user',session('info_user')[0]->id)->get();
             foreach ($calcul as $item) {
                $prox = produit::find($item->id_produit);
                $totalcommande+=$item->qt*$prox->prix;
             }
      $commande->totalcommande = $totalcommande;
      $commande->save();       
            
      //MIGRER LES INFO_COMMANDE DANS LISTE COMMANDE
       $migration = panier::where('id_user',session('info_user')[0]->id)->get();
         foreach ($migration as $item) {
               $list_com = new list_commande();
               $list_com->id_user = session('info_user')[0]->id;
               $list_com->id_produit = $item->id_produit;
               $list_com->id_commande = $commande->id;
               $list_com->quantitelist = $item->qt;
               $list_com->save();
         }

         //Mise a jours données user

          if(session('info_user')[0]->firstname==NULL){
            $mise_a_jour = User::find(session('info_user')[0]->id);
            $mise_a_jour->firstname = $request->firstname;
            $mise_a_jour->name = $request->name;
            $mise_a_jour->country = $request->country;
            $mise_a_jour->rue = $request->rue;
            $mise_a_jour->city = $request->city;
            $mise_a_jour->state = $request->state;
            $mise_a_jour->codzip = $request->codzip;
            $mise_a_jour->tel = $request->tel;
            $mise_a_jour->email = $request->email;
            $mise_a_jour->update();
 
          }
        
            //Vider le panier lorsque la commande est solicitée
             $panko = panier::where('id_user',session('info_user')[0]->id);
               $panko->delete();
                  
               // TRAITEMENT STOCK
               $jikend = panier::where('id_user',session('info_user')[0]->id)->get();

                     foreach($jikend as $item){
                      $ston = produit::find($item->id_produit);
                        $ston->stock-=$item->qt;
                        $ston->update();
                     }

                     return response()->json();
        }

         public function show_commandex(){
          if(session('info_user')){
            $show_com = commande::where('id_user',session('info_user')[0]->id)->lazyByIdDesc();
            return view('temp.show_commande',['show_com'=>$show_com]);
              }
          }
         
          public function show_commande_instant_t($id){
            if(session('info_user')){
               $show_com_t = commande::find($id);
              
               return view('temp.show_commande_user_instant_t',['show_com_t'=>$show_com_t]);
            }
          }

          public function adress_shipping($id){
            if(session('info_user')){
              $updat_shipping = commande::find($id);
                return view('temp.update_adress_shipping',['updat_shipping'=>$updat_shipping]);  
            }

          }

             
          public function formulaire_update1_user($id){
            if(session('info_user')){
             $upo = commande::find($id);
             return view('temp.debog_modif_shipping1',['upo'=>$upo]);
            }
        }

       

          public function update_adress_user(Request $request, $id){
          if(session('info_user')){
            $mise_a_jour = commande::find($id);
            $mise_a_jour->firstname = $request->firstname;
            $mise_a_jour->name = $request->name;
            $mise_a_jour->country = $request->country;
            $mise_a_jour->rue = $request->rue;
            $mise_a_jour->city = $request->city;
            $mise_a_jour->state = $request->state;
            $mise_a_jour->codzip = $request->codzip;
            $mise_a_jour->tel = $request->tel;
            $mise_a_jour->email = $request->email;
            
              $mise_a_jour->update();
              return response()->json(['status'=>200, 'message'=>'success']);
 
          }
         }


         public function formulaire_update2_user($id){
          if(session('info_user')){
           $upa = commande::find($id);
           return view('temp.adress_shipping2',['upa'=>$upa]);
          }
      }


      public function adress2_update(Request $request,$id){
        if(session('info_user')){
         $update_adress_shipping2 = commande::find($id);
         $update_adress_shipping2->adresscommande = $request->adresscommande;
         $update_adress_shipping2->update();       
               
         return response()->json(['status'=>200,'message'=>'success']);



        }
      }

       public function all_commande(){
        
          if(session('info_user')){
            $show_com_all = commande::where('id_user',session('info_user')[0]->id)->lazyByIdDesc();;
            return view('temp.show_all_commande',['show_com_all'=>$show_com_all]);
              }
       
       }
        /*  public function adress_shipping(){
            if(session('info_user')){
              $updat_shipping = commande::where('id_user',session('info_user')[0]->id)->get();
                return view('temp.update_adress_shipping',['updat_shipping'=>$updat_shipping]);  
            }

          }

          public function formulaire_update1_user(){
            if(session('info_user')){
             $upo = User::find(session('info_user')[0]->id);
             return view('temp.debog_modif_shipping1',['upo'=>$upo]);
            }
        }

         
          public function update_adress_user(Request $request){
            if(session('info_user')){
              $mise_a_jour = User::find(session('info_user')[0]->id);
              $mise_a_jour->firstname = $request->firstname;
              $mise_a_jour->name = $request->name;
              $mise_a_jour->country = $request->country;
              $mise_a_jour->rue = $request->rue;
              $mise_a_jour->city = $request->city;
              $mise_a_jour->state = $request->state;
              $mise_a_jour->codzip = $request->codzip;
              $mise_a_jour->tel = $request->tel;
              $mise_a_jour->email = $request->email;
              $mise_a_jour->update();
              return response()->json(['status'=>200,'message'=>'success']);
   
            }
           }

          
          /* public function excetion($id){
            if(session('info_user')){
              $exception3 = commande::find($id);
              return view('temp.update_adress_shipping',['exception3'=>$exception3]);
           }


          
           public function adress_shiping2($id){
            if(session('info_user')){
              $shipping2 = commande::find($id);
              return view('temp.adress_shipping2',['shipping2'=>$shipping2]);
            }
           }

           

         

           public function ego_update(Request $request){
             if(session('info_user')){
              $update_adress_shipping2 = commande::find(session('info_user')[0]->id);
         
              $update_adress_shipping2 = session('info_user')[0]->id;
              $update_adress_shipping2 = $request->firstname;
              $update_adress_shipping2->name = $request->name;
              $update_adress_shipping2->country = $request->country;
              $update_adress_shipping2->rue = $request->rue;
              $update_adress_shipping2->city = $request->city;
              $update_adress_shipping2->state = $request->state;
              $update_adress_shipping2->codzip = $request->codzip;
              $update_adress_shipping2->tel = $request->tel;
              $update_adress_shipping2->email = $request->email;
              $update_adress_shipping2->codcommande = time().'DINX'.rand(1111,9999);
              $update_adress_shipping2->adresscommande = $request->adresscommande;
              $update_adress_shipping2->infosuplement = $request->infosuplement;
                     
                   $totalcommande = 0;
                   $calcul = panier::where('id_user',session('info_user')[0]->id)->get();
                     foreach ($calcul as $item) {
                        $prox = produit::find($item->id_produit);
                        $totalcommande+=$item->qt*$prox->prix;
                     }
                     $update_adress_shipping2->totalcommande = $totalcommande;
                     $update_adress_shipping2->update();       
                    
              return response()->json(['status'=>200,'message'=>'success']);



             }
           }

           public function show_commande_user_all(){
            if(session('info_user')){
              $show_com = commande::where('id_user',session('info_user')[0]->id)->get();
              return view('temp.show_commande_user_all',['show_com'=>$show_com]);
                }
            }
           */

       
}

