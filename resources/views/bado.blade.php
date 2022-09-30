<form action="">
 <!--   IMIGRATION CATEGORIE-->

  $table->string('reference');
  $table->string('nom');
  $table->string('statut');
  $table->string('popularite');
  $table->string('photo');
  $table->softdelete();

          <!--   MODEL CATEGORIE-->
      use softdelete();
          protected $ninx = 'categories';
          protected  $nonx = [];

            <!--   FORMULAIRE CATEGORIE............................................................-->
            <div id="tox"></div>
 <form method="POST" id="lox">
    <div class="group-control">
           <label for="ref">ref</label>
           <input type="text" name="ref" class="form-control">
    </div>

    <div class="group-control">
        <label for="nam">nam</label>
        <input type="text" name="nam" class="form-control">
 </div>

 <div class="group-control">
    <label for="stat">statf</label>
    <input type="checkbox" name="stat">stat
</div>

<div class="group-control">
    <label for="pop">pop</label>
    <input type="checkbox" name="ref">pop
</div>

<div class="group-control">
    <label for="img">img</label>
    <input type="file" name="img">
</div>

<div class="group-control">
   <button type="button" class="btn btn-primary" onclick="store()">Enter</button>
</div>
      
 </form>


<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th><button type="button" class="btn btn-danger kax">Delete_multiple</button></th>
                            <th>Reference</th>
                            <th>Name</th>
                            <th>statut</th>
                            <th>popularite</th>
                            <th>Image</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                     <tfoot>
                        <tr>
                            <th><button type="button" class="btn btn-danger kax">Delete_multiple</button></th>
                            <th>Reference</th>
                            <th>Name</th>
                            <th>statut</th>
                            <th>popularite</th>
                            <th>Image</th>
                            <th>ACTION</th>
                        </tr>
                     </tfoot>
                      <tbody>
                        @foreach ($show_cat as $item)
                             <tr>
                                <td><input type="checkbox" value="{{$item->id}}" class="pox"></td>
                                <td>{{$item->reference}}</td>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->statut}}</td>
                                <td>{{$item->popularite}}</td>
                                <td><img src="{{asset('categorie/'.$item->photo)}}" alt="" width="70px" height="70px"></td>
                                <td>
                                    <button type="button" class="btn btn-warning" onclick="edit_cato({{$item->id}})">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                             </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="tax"></div>
<form method="POST" id="lax">
   <div class="group-control">
          <label for="ref">ref</label>
          <input type="text" name="ref" class="form-control" value="{{$edit_cat->reference}}">
   </div>

   <div class="group-control">
       <label for="nam">nam</label>
       <input type="text" name="nam" class="form-control" value="{{$edit_cat->nom}}">
</div>

<div class="group-control">

   <input type="checkbox" name="stat" {{$edit_cat->statut=='1' "checked":""}}>stat
   <input type="checkbox" name="pop" {{$edit_cat->popularite=='1' "checked":""}}>pop

</div>


<div class="group-control">
   <label for="img">img</label>
   <input type="file" name="img">
</div>

<div class="group-control">
   @if ($edit_cat->photo){
    <img src="{{asset('categorie/'.$edit_cat->photo)}}" alt="" width="70px" height="70px">

   }
       
   @endif
 </div>

<div class="group-control">
  <button type="button" class="btn btn-primary" onclick="update({{$edit_cat->id}})">Enter</button>
</div>
     
</form>


<!--  CONTROLLER CATEGORIE-->
 public function create(){
return view('temp.create_cat');
}


  public function store_cat(Request $Request){
     $add_cat = new categorie();
     $add_cat->reference = $request->ref;
     $add_cat->statut = $request->stat==TRUE ? 1:0;
     $add_cat->popularite = $request->pop==TRUE ? 1:0;
     if($request->hasfile('photo')){
           $file = $request->file('photo');
               $name = time().'.'.$file->getClientOriginalExtension();
                  $file->move('categorie',$name);
                     $add_cat->photo = $name;
                    }
     $add_cat->save();
     return response()->json(['status'=>200,'message'=>'Enregistrement effectué avec success!!']);

  }

  public function show(){
    $show_cat = categorie::all();
    return view('temp.show_cato',['show_cat'=>$show_cat]);
  }

  public function edit($id){
    $edit_cat = categorie::find($id);
    return view('temp.edit_cat',['edit_cat'=>$edit_cat]);
  }

  public function updat(Request $request, $id){
    $add_cat = categorie::find($id);
    $add_cat->reference = $request->ref;
    $add_cat->statut = $request->stat==TRUE ? 1:0;
    $add_cat->popularite = $request->pop==TRUE ? 1:0;
    if($request->hasfile('photo')){
          $file = $request->file('photo');
              $name = time().'.'.$file->getClientOriginalExtension();
                 $file->move('categorie',$name);
                    $add_cat->photo = $name;
                   }
    $add_cat->update();
    return response()->json(['status'=>200,'message'=>'Modification effectuée avec success!!']);
  }

  public function Delete($id){
    categorie::find($id)->delete();
    return "suppression effectuée avec success";
  }

 public function destroy(Request $request){
    categorie::withTrashed(',',explode('id',$request->stock_data))->delete();
    return response()->json();
 }


 public function create_pro(){
    $affo = categorie::all();
    return view('temp.create_pro',['affo'=>'$affo']);
 }

 public function store_pro(Request $request){
    $add_pro = new produit();
    $add_pro->reference = $request->ref;
    $add_pro->nom = $request->nam;
    $add_pro->des = $request->des;
    $add_pro->prix = $request->prix;
    $add_pro->desc = $request->desc;
    $add_pro->statut = $request->stat==TRUE ? 1:0;
    $add_pro->popularite = $request->pop==TRUE ? 1:0;
    $add_pro->id_categorie = $request->categorie;
         if($request->hasfile('photo')){
            $file = $resquest->file('photo');
              $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('produit',$name);
                  $add_pro->photo = $name;
         }
    $add_pro->save();
                      if($request->hasfile('photos')){
                            foreach ($request->hasfile('photos') as $key=>$files){
                                $names = time().'.'.$key.$files->Extension();
                                  $files->move('produit',$names);
                                    $gax = new image_produit();
                                     $gax->id_produit = $add_pro->id;
                                       $gax->photos = $names;
                                         $gax->save();
                            }
                                
                           
                }
    return response()->json(['status'=>200, 'message'=>'Enregistrement effectué avec success!!']);
    

}

public function show_pro(){
    $show_pro = produit::all();
    return view('temp.show_pro',['show_pro'=>$show_pro]);
}

public function edit_pro($îd){
    $cat = categorie::all();
    $edit_pro = produit::find($id);
    return view('temp.edit_pro',['edit_pro'=>$edit_pro]);
}


public function updat_pro(Request $request, $id){
    $add_pro =  produit::find($id);
    $add_pro->reference = $request->ref;
    $add_pro->nom = $request->nam;
    $add_pro->des = $request->des;
    $add_pro->prix = $request->prix;
    $add_pro->desc = $request->desc;
    $add_pro->statut = $request->stat==TRUE ? 1:0;
    $add_pro->popularite = $request->pop==TRUE ? 1:0;
    $add_pro->id_categorie = $request->categorie;
         if($request->hasfile('photo')){
            $file = $resquest->file('photo');
              $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('produit',$name);
                  $add_pro->photo = $name;
         }
    $add_pro->update();
                      if($request->hasfile('photos')){
                            foreach ($request->hasfile('photos') as $key=>$files){
                                $names = time().'.'.$key.$files->Extension();
                                  $files->move('produit',$names);
                                    $gax = new image_produit();
                                     $gax->id_produit = $add_pro->id;
                                       $gax->photos = $names;
                                         $gax->save();
                            }
                                
                           
                }
    return response()->json(['status'=>200, 'message'=>'Modification effectuée avec success!!']);
    
 
}


public function delete_pro($id){
    produit::find($id)->delete();
}

public function delete_galerie($id){
    if($id){
        image_produit::find($id)->delete();
        return "suppression effectuée avec success!!!";
    }
}


  <!--  ROUTE CATEGORIE-->
    Route::get('categorie/create',[categoriecontroller::class,'create']);
    Route::post('categorie/store_cat',[categoriecontroller::class,'store_cat']);
    Route::get('categorie/show',[categoriecontroller::class,'show']);
    Route::get('categorie/edit/{id}',[categoriecontroller::class,'edit']);
    Route::get('categorie/update/{id}',[categoriecontroller::class,'updat']);
    Route::get('categorie/delete/{id}',[categoriecontroller::class,'Delete']);
    Route::get('delete_multiplo',[categoriecontroller::class,'destroy']);
     <!--  ROUTE PRODUIT-->
    Route::get('produit/create',[produitcontroller::class,'create_pro']);
    Route::post('produit/store_pro',[produitcontroller::class,'store_pro']);
    Route::get('produit/show_pro',[produitcontroller::class,'show_pro']);
    Route::get('produit/edit_pro/{id}',[produitcontroller::class,'edit_pro']);
    Route::post('produit/update_pro/{id}',[produitcontroller::class,'update_pro']);
    Route::get('produit/delete_pro/{id}',[produitcontroller::class,'delete_pro']);
    Route::get('produit/delete_galerie/{id}',[produitcontroller::class,'delete_galerie']);




<!--   IMIGRATION PRODUIT-->

$table->string('reference');
$table->string('nom');
$table->string('description');
$table->string('prix');
$table->string('stock');
$table->string('desconte');
$table->string('statut');
$table->string('popularite');
$table->string('photo');
$table->integer('id_categorie');
$table->softdelete();

        <!--   MODEL PRODUIT-->
    use softdelete();
        protected $nnx = 'produits';
        protected  $nnix = [];
       
        public function categorie(){
            return this->belongTo(categorie::class,'id_categorie','id');
        }

        public function images(){
           return this->hasManyTo(image_produit::class,'id_produit','id');
        }

        <!--   IMIGRATION image_produit-->


$table->string('photos');
$table->integer('id_produit');
$table->softdelete();

     <!--   MODEL IMAGE_PRODUIT-->
     use softdelete();
     protected $nnx = 'image_produits';
     protected  $nnix = [];
          <!--   FORMULAIRE CATEGORIE............................................................-->

          <div id="don"></div>
<form method="POST" id="lix">
   <div class="group-control">
          <label for="ref">ref</label>
          <input type="text" name="ref" class="form-control">
   </div>

   <div class="group-control">
       <label for="nam">nam</label>
       <input type="text" name="nam" class="form-control" >
</div>

<div class="group-control">
    <label for="des">des</label>
    <input type="text" name="des" class="form-control">
</div>

<div class="group-control">
    <label for="pri">prix</label>
    <input type="text" name="prix" class="form-control">
</div>

<div class="group-control">
    <label for="desc">desc</label>
    <input type="text" name="desc" class="form-control">
</div>

<div class="group-control">
    <label for="st">st</label>
    <input type="text" name="stock" class="form-control">
</div>

<div class="group-control">

   <input type="checkbox" name="stat">stat
   <input type="checkbox" name="pop">pop

</div>


<div class="group-control">
   <label for="img">img</label>
   <input type="file" name="photo">
</div>

<div class="group-control">
    <label for="gal">Gallery</label>
    <input type="file" name="photos[]" multiple>
 </div>


 <div class="group-control">
    <label for="cat">catgorie</label>
  <select name="categorie" id="categorie">
    @foreach ($affo as $item)
        <option value="{{$item->id}}">{{$item->nom}}</option> 
    @endforeach
  </select>
</div>


<div class="group-control">
  <button type="button" class="btn btn-primary" onclick="store_pro()">Enter</button>
</div>
     
</form>


<table class="table">
    <thead>
        <tr>
            <th>Ref</th>
            <th>nam</th>
            <th>des</th>
            <th>prix</th>
            <th>desc</th>
            <th>img</th>
            <th>gallery</th>
            <th>ACTION</th>
        </tr>
    </thead>
          <tfoot>
            <tr>
                <th>Ref</th>
                <th>nam</th>
                <th>des</th>
                <th>prix</th>
                <th>desc</th>
                <th>img</th>
                <th>gallery</th>
                <th>ACTION</th>
            </tr>
          </tfoot>
              <tbody>
                   @foreach ($show_pro as $item)
                   <tr>
                    <td>{{$item->reference}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->des}}</td>
                    <td>{{$item->prix}}</td>
                    <td>{{$item->desc}}</td>
                    <td><img src="{{asset('produit/'.$item->photo)}}" alt="" width="70px" height="70px"></td>
                            @foreach ($item->image as $dinx)
                               <td><img src="{{asset('produit/'.$dinx->photos)}}" alt="" width="70px" height="70px" data-image="{{$dinx->id}}" class="fipox" onclick="delete_galerie({{$dinx->id}})"></td>
                            @endforeach
                    <td><button type="button" class="btn btn-warning" onclick="edit_pro({{$item->id}})">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="delete_pro({{$item->id}})">Delete</button>
                    </td>
                   </tr>
                   @endforeach
              </tbody>
</table>


<div id="fonx"></div>
<form method="POST" id="inx">
   <div class="group-control">
          <label for="ref">ref</label>
          <input type="text" name="ref" class="form-control" value="{{$edit_pro->reference}}">
   </div>

   <div class="group-control">
       <label for="nam">nam</label>
       <input type="text" name="nam" class="form-control" value="{{$edit_pro->nom}}">
</div>

<div class="group-control">
    <label for="des">des</label>
    <input type="text" name="des" class="form-control" value="{{$edit_pro->des}}">
</div>

<div class="group-control">
    <label for="pri">prix</label>
    <input type="text" name="prix" class="form-control"  value="{{$edit_pro->prix}}">
</div>

<div class="group-control">
    <label for="desc">desc</label>
    <input type="text" name="desc" class="form-control" value="{{$edit_pro->desc}}">
</div>

<div class="group-control">
    <label for="st">st</label>
    <input type="text" name="stock" class="form-control" value="{{$edit_pro->stock}}">
</div>

<div class="group-control">

   <input type="checkbox" name="stat" {{$edit_pro->statut=='1' ? "checked":""}}>stat
   <input type="checkbox" name="pop" {{$edit_pro->popularite=='1' ? "checked" : ""}}>pop

</div>


<div class="group-control">
   <label for="img">img</label>
   <input type="file" name="photo">
</div>

<div class="group-control">
   @if ($edit_pro->photo)
   <img src="{{asset('produit/'.$edit_pro->photo)}}" alt="" width="70px" height="70px">     
   @endif
 </div>

<div class="group-control">
    <label for="gal">Gallery</label>
    <input type="file" name="photos[]" multiple>
 </div>


 <div class="group-control">
    <label for="cat">catgorie</label>
  <select name="categorie" id="categorie">
    @foreach ($cat as $item)
        <option value="{{$item->id}}">{{$item->nom}}</option> 
    @endforeach
  </select>
</div>


<div class="group-control">
  <button type="button" class="btn btn-primary" onclick="update_pro({{$edit_pro->id}})">Enter</button>
</div>
     
</form>

    <!--  BASE CATEGORIE-->
    <script>
        function store(){
            var formdata = new ForData($("#lox")[0]);
            $.ajax({
                 type:"post",
                 url:"{{url('categorie/store_cat')}}" ,
                 data:formdata,
                 processData:false,
                 contentType:false,
                 success:function(response){
                    if(response.status==200){
                        $("#tox").html(response.message).addClass('alert alert-success');
                    }else{
                        $("#tox").html('Error').addClass('alert alert-danger');

                    }
                 }
            });
        }
    </script>

    <script>
        function show_cat(){
            $.get("{{url('categorie:show')}}",{},function(data,status){
               $("page").html(data);
               
            });
        }
    </script>

    <script>
        function edit_cato(id){
            $.get("{{url('categorie/edit')}}/"+id,{},function(data,status){
               $("#lox").html(data);
               $("#general").modal('show');
            });
        }
    </script>

    <script>
        function update(id){
            var formdata = new FormData($("#lax")[0]);
            $.ajax({
              type:"post",
              url:"{{url('categorie/update')}}/"+id;
              data:formdata,
              processData:false,
              contentType:false,
              success:function(response){
                if(response.status==200){
                    $("#lax").htm(response.message).addClass('alert alert-success');

                }else{
                    $("#lax").htm('Error').addClass('alert alert-danger');

                }
              }
            });
        }
    </script>

    <script>
        function delete_cat(id){
            $.get("{{url('categorie/delete')}}/"+id,{},function(){

            });
        }
    </script>

    <script>
        function delete_multiple(){
            $(document).on('click','.pox',function(){
                var stock_data = [];
                $(".pox").each(function(){
                    if($(this).is(":checked")){
                        stock_data.push($(this).val()); 
                    }
                });

                console.log(stock_data);
                $(".kax").on('click',function(){
                    $.ajax({
                           type:"get",
                           url:"{{url('delete_multiplo')}}",
                           data:"stock_data="+stock_data,
                           success:function(response){
                            alert('okkkkk');
                           }
                    });
                });
            })
        }
    </script>

    <script>
        function store_pro(){
            var formdata = new FormData($("#lix")[0]);
             $.ajax({
                  type:"post",
                  url:"{{url('produit/store_pro')}}",
                  data:formdata,
                  processData:false,
                  contentType:false,
                  success:function(response){
                    if(response.status==200){
                        $("#dom").html(response.message).addClass('alert alert-success');
                    }else{
                        $("#dom").html('Error').addClass('alert alert-danger');

                    }
                  }
             });
        }
    </script>

    <script>
        function show_pro(){
            $.get("{{url('produit/show_pro')}}",{},function(data,status){
                $("#page").html(data);
            })
        }
    </script>

    <script>
        function edit_pro(id){
            $.get("{{url('produit/edit_pro')}}/"+id,{},function(data,status){
                 $("#corp").html(data);
                 $("#general").modal('show');
            })
        }
    </script>

    <script>
        function update_pro(id){
            var formdata = new FormData($("#inx")[0]);
            $.ajax({
                type:"post",
                url:"{{url('produit/update_pro')}}/"+id,
                data:formdata,
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.status==200){
                        $("#lonx").html(response.message).addClass('alert alert-success');
                    }else{
                        $("#lonx").html('Error').addClass('alert alert-danger');

                    }
                }
            })
        }
    </script>

    <script>
        function delete_pro(id){
            $.get("{{url('produit/delete_pro')}}/"+id,{},function(){
 
            });
        }
    </script>

    <script>
        function delete_galerie(id){
            $(document).on('click','.fipox',function(){
                var fordata = $(this).attr('data-image');

$.ajax({
   type:"get",
   url:"{{url('produit/delete_galerie')}}/"+id,
});
            });
           
        }
    </script>

    --------------------------------------------------------------------------------------
    public function home_template(){
        $show_pro = produit::all();
        return view('temp.home',['show_pro'=>$show_pro]);
    }

    public function descript($id){
      $descript = produit::find($id);
      $pro_cat = produit::where('id_categorie',$descript->id_categorie);
    }

   public function add_usario(Request $request){
       if($request->password != $request->password2){
        return response()->json(['status'=>400,'message'=>'Mot de passe incompartible!!!']);
       }elseif(empty($request->email) || empty($request->name) || empty($request->password) || empty($request->password2)){
         return response()->json(['status'=>300,'message'=>'Veillez remplir tous les champs!!']);
       }else{
         $user = new user();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = $request->password;
         $user->save();
          if(user::where(['email'=>$request->email,'password'=>$request->password])->count()>0){
            $info_user = user::where(['email'=>$request->email,'password'=>$request->password])->get();
             session(['info_user'=>$info_user]);
             return response()->json(['status'=>200,'message'=>'success']);
          }

       }
   }

   public function login(Request $request){
     if(user::where(['email'=>$request->email,'password'=>$request->password])->count()>0){
        $info_user = user::where(['email'=>$request->email,'password'=>$request->password])->get();
         session(['info_user'=>$info_user]);
         return response()->json(['status'=>200,'message'=>'success']);


     }
   }

   public function add_panier($id){
     if(session('info_user')){
        $add_panier = new panier();
        $add_panier->id_user = session('info_user')[0]->id;
        $add_panier->id_produit = $id;
        $add_panier->qt = 1;
        $add_panier->save();
        return response()->json(['status'=>200,'message'=>'Vous venez dajouter un produit au panier!!!']);
     }
   }

   public function show_cart(){
   if(session('info_user')){
     $show_cart = panier::where('id_user',session('info_user')[0])->get();
       return view('temp.show_cart',['show_cart '=>$show_cart ]);
   }
   }

   public function small_cart(){
    if(session('info_user')){
        $tablo = [];
         $show_small_cart = panier::where('id_user',session('info_user')[0]->id)->get();
             foreach ($show_small_cart as $item){
                $produit_small_cart = produit::find($item->id_produit);
                $tablo [] = ['$item'=>pan,'$produit_small_cart'=>pro];
             }
             return response()->json($tablo);
                 
            
    }
   }

    public function count_cart(){
        if(session('info_user')){
            $count_cart = panier::where('id_user',session('info_user')[0]->id)->count();
           return response()->json($count_cart);
        }
    }

     public function total_small_cart(){
       if(session('info_user')){
        $total = 0;
        $total_cart = panier::where('id_user',session('info_user')[0]->id)->get();
          foreach($total_cart as $item){
           $prodo = produit::find($item->id_produit);
           $total+=$total_cart->qt*$prodo->prix;
          }
          return response()->json($total);
       }
     }


     public function commande(Request $request){
        if(session('info_user')){
            $commande = new commande();
            $commande->firstname = $request->firstname;
            $commande->name = $request->name;
            $commande->country = $request->country;
            $commande->state = $request->state;
            $commande->city = $request->city;
            $commande->qtr = $request->qtr;
            $commande->codzip = $request->codzip;
            $commande->tel = $request->tel;
            $commande->email = $request->email;
            $commande->id_user = session('info_user')[0]->id;
            $commande->codcommande = time().'ECO'.rand(1111,9999);
            $commande->adresscommande = $request->adresscommande;

            $totalcommande = 0;
             
            $recup = panier::where('id_user',session('info_user')[0]->id)->get();
                foreach($recup as $item){
                    $pro = produit::find($item->id_produit);
                   $totalcommande+=$recup->qt*$pro->prix;
                }

         $commande->totalcommande = $request->totalcommande;
         $commande->save();

           $okix = panier::where('id_user',session('info_user')[0]->id)->get();
             foreach($okix as $item){
                $add_list = new list_commande();
                  $add_list->id_user = session('info_user')[0]->id;
                  $add_list->id_produit = produit::find($item->id_produit);
                  $add_list->id_commande = $commande->id;
                  $add_list->qt_list = $item->qt;
                  $add_list->save();
             }

              if(session('info_user')[0]->firstname==NULL){
                $commande = user::find(session('info_user')[0]->id);
                $commande->firstname = $request->firstname;
                $commande->name = $request->name;
                $commande->country = $request->country;
                $commande->state = $request->state;
                $commande->city = $request->city;
                $commande->qtr = $request->qtr;
                $commande->codzip = $request->codzip;
                $commande->tel = $request->tel;
                $commande->email = $request->email;
                $commande->update();
              }

               $raz = panier::where('id_user',session('info_user')[0]->id)->get();
               $raz->delete();

               $atualiz_stock = panier::where('id_user,(info_user')[0]->id)->get();
               foreach($atualiz_stock as $item){
                   $pro = produit::find($item->id_produit);
                   $pro->stock-=$pro->stock-$atualiz_stock->qt;
                   $atualiz_stock->update();
               }


            

            

            

        }
     }

    --------------------------------------------------------------------------------------------------------------------------------------------
        ajaxx 

        function add_panier(id){
         $.ajax({
            type:"get",
            url:"{{url('jdjdjdjdjdjdjd')}}/"+id,
            success:function(response){
                if(response.satus==200){
                    $("#corp").html(response.message).addClass('alert-success');
                    $("#general").modal('show');
                }else{
                    window.location.href="{{url('user/login')}}";
                }
            }
         })

        }

        function show_small_cart(){
            $.ajax({
                type:"get",
                url:"{{url('panier/small_cart')}}",
                success:function(response){
                    response.ForEach(Element=>{
                  $("#smoll").append(`
                     
                  `);
                    });
                }
            })
        }

         function count_cart(){
            $.ajax({
                type:"get",
                url:"{{url('panier/count_cart')}}",
                success:function(response){
                    $("#count").html('');
                    $("#count").html(response);
                }
            });
         }

         
</form>
<script>
     $(document).on('click','.increment',function(){
                var incre = $(this).closest('.papa').find('.qt_modif').val();
                var convertisseur = parseInt(incre,10);
                convertisseur = isNaN(incre)? 0:convertisseur;
                if(covertisseur < 0){
                    convertisseur++;
                    $(this).closest('.papa').find('.qt_modif').val(convertisseur);
                }
          });

          $(document).on('click','.decrement',function(){
            var decre = $(this).closest('.papa').find('.qt_modif').val();
            var convertisseur = parseInt(decre,10);
            convertisseur = isNaN(incre)? 0:convertisseur;
            if(covertisseur < 0){
                convertisseur++;
                $(this).closest('.papa').find('.qt_modif').val(convertisseur);
            }
      });

      $(".mixt").on('click',function(){
        var quantite = $(this).closest(".papa").find(".qt_modif").val();
        var id_panier = $(this).closest(".papa").find(".id_panier").val();

          
        $.ajax({
                 type:"post",
                 url:"{{url('panier/updat')}}",
                 data:({
                        "quantite" : quantite,
                        "id_panier" :id_panier,
                 }),
               processData:false,
               contentType:false,
               success:function(response){
                alert('okkkk');
               }
        });
      });
</script>