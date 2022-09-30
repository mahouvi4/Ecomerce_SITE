<div class="informo"></div>
<form method="POST" id="proto">
    <div class="group-control">
        <label for="reference">Reference</label>
        <input type="text" class="form-control" name="reference">
    </div>

    <div class="group-control">
        <label for="nom">Produit</label>
        <input type="text" class="form-control" name="nom">
    </div>

    <div class="group-control">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" name="prix">
    </div>
    
    <div class="group-control">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea> 
   </div>

   

    <div class="group-control">
        <label for="desconte">Desconte</label>
        <input type="text" class="form-control" name="desconte">
    </div>

    <div class="group-control">
        <label for="stock">Stock</label>
        <input type="text" class="form-control" name="stock">
    </div>

    <div class="group-control">
       
        <input type="checkbox"  name="statut">Statut
        <input type="checkbox"  name="popularite">Popularite

    </div>

    <div class="group-control">
        <label for="photo">IMAGES</label>
        <input type="file" class="form-control" name="photo">
    </div>

    <div class="group-control">
        <label for="photos">GALLERY</label>
        <input type="file" class="form-control" name="photos[]" multiple>
    </div>

    <div class="group-control">
        <label for="categorie">CATEGORIE</label>
        <select name="categorie" id="categorie">
            @foreach ($cat as $item)
                <option value="{{$item->id}}">{{$item->name_cat}}</option>
            @endforeach
        </select>
    </div>
    

    <div class="group-control">
       
        <button type="button" class="btn btn-primary" onclick="storep()">Enter</button>

    </div>

</form>







