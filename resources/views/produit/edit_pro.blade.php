<div class="informo4"></div>
<form method="POST" id="fongx">
    <div class="group-control">
        <label for="reference">Reference</label>
        <input type="text" class="form-control" name="reference" value="{{$edit_pro->reference}}">
    </div>

    <div class="group-control">
        <label for="nom">Produit</label>
        <input type="text" class="form-control" name="nom"  value="{{$edit_pro->nom}}">
    </div>

    <div class="group-control">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" name="prix" value="{{$edit_pro->prix}}">
    </div>
    
    <div class="group-control">
        <label for="description">Description</label>
        <textarea name="description"  class="form-control">{{$edit_pro->description}}</textarea>
    </div>

   

    <div class="group-control">
        <label for="desconte">Desconte</label>
        <input type="text" class="form-control" name="desconte" value="{{$edit_pro->desconte}}">
    </div>

    <div class="group-control">
        <label for="stock">Stock</label>
        <input type="text" class="form-control" name="stock" value="{{$edit_pro->stock}}">
    </div>

    <div class="group-control">
       
        <input type="checkbox"  name="statut" {{$edit_pro->statut==1 ?'checked': ''}}>Statut
        <input type="checkbox"  name="popularite"  {{$edit_pro->popularite==1 ? "checked": ''}}>Popularite

    </div>

    <div class="group-control">
        <label for="photo">IMAGES</label>
        <input type="file" class="form-control" name="photo">
    </div>

    <div class="group-control-file">
        @if ($edit_pro->photo)
        <img src="{{asset('produit/'.$edit_pro->photo)}}" alt="{{$edit_pro->nom}}" width="70px" height="40px">
  
        @endif
    </div>

    <div class="group-control">
        <label for="photos">GALLERY</label>
        <input type="file" class="form-control" name="photos[]" multiple>
    </div>

    <div class="group-control">
        <label for="categorie">CATEGORIE</label>
        <select name="categorie" id="categorie">
            @foreach ($catex as $item)
                <option value="{{$item->id}}">{{$item->name_cat}}</option>
            @endforeach
        </select>
    </div>
    

    <div class="group-control">
       
        <button type="button" class="btn btn-primary" onclick="update_pro({{$edit_pro->id}})">Enter</button>

    </div>

</form>







