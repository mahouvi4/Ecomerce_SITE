<div class="container">
    <div class="row">
        <div class="card">
           <div class="card-header">SHOW PRODUCT</div>
           <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
    <th><button type="button" class="btn btn-danger jinx">delete_multiple</button></th>
                        <th>Reference</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Desconte</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Gallery</th>
                        <th>ACTION</th>
                        
            
                    </tr>
                </thead>
            
                <tfoot>
                    <tr>
    <th><button type="button" class="btn btn-danger jinx">delete_multiple</button></th>

                        <th>Reference</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Desconte</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Gallery</th>
                        <th>ACTION</th>
                        
            
                    </tr>
                </tfoot>
            
                <tbody>
                    @foreach ($show_pro as $item)
                        <tr>
                        <td><input type="checkbox" class="ingx" value="{{$item->id}}"></td>
                            <td>{{$item->reference}}</td>
                            <td>{{$item->nom}}</td>
                            <td>{{$item->prix}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->desconte}}</td>
                            <td>{{$item->stock}}</td>
                            <td><img src="{{asset('produit/'.$item->photo)}}" alt="{{$item->nom}}" width="70px" height="40px">
                        </td>
                        <td>
                        @foreach ($item->images as $gallery)
                    <img src="{{asset('produit/'.$gallery->photos)}}" alt="" width="70px" height="40px" data-image="{{$gallery->id}}" class="fox" onclick="delete_gallery({{$gallery->id}})">                       
                        @endforeach
                    </td> 
                            <td><button type="button" class="btn btn-warning" onclick="edit_pro({{$item->id}})">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="deletep({{$item->id}})">Delete</button>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
           </div>
        </div>
    </div>
</div>

