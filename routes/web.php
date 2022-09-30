<?php

use App\Http\Controllers\categoriecontroller;
use App\Http\Controllers\commandecontroller;
use App\Http\Controllers\couleur_produitcontroller;
use App\Http\Controllers\likecontroller;
use App\Http\Controllers\paniercontroller;
use App\Http\Controllers\produitcontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Template\Template;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cadastro', function () {
    return view('template');
});

//ROUTE TEMPLATE
Route::get('template/home_template', function () {
    return view('temp.home_template');
});

//CATEGORIE

Route::get('categorie/create',[categoriecontroller::class,'create']);
Route::post('categorie/store',[categoriecontroller::class,'store']);
Route::get('categorie/show_cat',[categoriecontroller::class,'show']);
Route::get('categorie/edit/{id}',[categoriecontroller::class,'edit']);
Route::post('categorie/update/{id}',[categoriecontroller::class,'update']);
Route::get('categorie/delete/{id}',[categoriecontroller::class,'destroy']);
Route::get('categorie/restore',[categoriecontroller::class,'restore']);
Route::get('categorie/delete_multiple',[categoriecontroller::class,'delete_multiple']);

//COULEUR_PRODUIT
Route::get('couleur/create',[couleur_produitcontroller::class,'create']);
Route::post('couleur/store',[couleur_produitcontroller::class,'store']);
Route::get('couleur/show',[couleur_produitcontroller::class,'show']);

//PRODUIT
Route::get('produit/create',[produitcontroller::class,'create']);
Route::post('produit/store',[produitcontroller::class,'store']);
Route::get('produit/show',[produitcontroller::class,'show']);
Route::get('produit/edit/{id}',[produitcontroller::class,'edit']);
Route::post('produit/update/{id}',[produitcontroller::class,'update']);
Route::get('produit/delete/{id}',[produitcontroller::class,'destroy']);
Route::get('produit/delete_gallery/{id}',[produitcontroller::class,'delete_gallery']);
Route::get('produit/delete_multiplo',[produitcontroller::class,'delete_multiplo']);
Route::get('produit/restore_pro',[produitcontroller::class,'restore_pro']);
//RECHERCHE
Route::get('produit/recherche',[produitcontroller::class,'recherche_x']);


//TEMPLATE
Route::get('/',[produitcontroller::class,'home_template']);
Route::get('Template/description/{id}',[produitcontroller::class,'description']);

//PANIER
Route::get('template/add_panier/{id}',[paniercontroller::class,'add_panier']);
Route::get('template/show_cart',[paniercontroller::class,'show_cart']);
Route::get('template/panier_vrai', function () {
    return view('temp.panier2');
});
Route::get('template/count_cart',[paniercontroller::class,'count_cart']);
Route::get('template/show_small_cart',[paniercontroller::class,'show_small_cart']);
Route::get('template/total_small_cart',[paniercontroller::class,'total_small_cart']);
Route::get('template/delete_panier/{id}',[paniercontroller::class,'delete_produit_panier']);
Route::post('template/update_qt_cart',[paniercontroller::class,'update_qt_cart']);
Route::get('template/mon_compte',[paniercontroller::class,'mon_compte']);
Route::get('template/checkout_x',[paniercontroller::class,'checkout_x']);
Route::get('template/product_category',[paniercontroller::class,'product_category']);

//lIKE
Route::get('template/add_like/{id}',[likecontroller::class,'add_like']);
Route::get('template/count_like',[likecontroller::class,'count_like']);
Route::get('template/show_list_like',[likecontroller::class,'show_list_like']);
Route::get('template/delete_like/{id}',[likecontroller::class,'delete_like']);

//USER
Route::get('template/login_create',[usercontroller::class,'create']);

Route::post('template/store_user',[usercontroller::class,'store']);
Route::post('template/login_user',[usercontroller::class,'login_user']);
Route::get('template/show_user/{id}',[usercontroller::class,'uz']);


//COMMANDEs
Route::post('template/add_checkout',[commandecontroller::class,'store_commande']);
Route::get('template/show_commande',[commandecontroller::class,'show_commandex']);
Route::get('template/show_commande_instant_t/{id}',[commandecontroller::class,'show_commande_instant_t']);
Route::get('template/update_adress_shipping/{id}',[commandecontroller::class,'adress_shipping']);
Route::get('template/formulaire/update_adress_shipping/{id}',[commandecontroller::class,'formulaire_update1_user']);
Route::post('template/update_adress_user/{id}',[commandecontroller::class,'update_adress_user']);

Route::get('template/adress_shiping2/{id}',[commandecontroller::class,'formulaire_update2_user']);
Route::post('template/update_address_shippingx2/{id}',[commandecontroller::class,'adress2_update']);
Route::get('template/all_commande_user_checkout',[commandecontroller::class,'all_commande']);
Route::get('template/show_commande_user_all',[commandecontroller::class,'show_commande_user_all']);





Route::get('user/sedeconnecter',[usercontroller::class,'sedeconnecter']);