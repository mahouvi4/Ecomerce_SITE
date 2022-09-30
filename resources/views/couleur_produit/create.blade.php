<div class="infox"></div>
<form method="POST" id="coul">
    <div class="group-control">
        <label for="couleur">couleur</label>
        <input type="text" class="form-control" name="nom_couleur[]" multiple>
    </div>

    <div class="group-control">
        <label for="produit">PRODUIT</label>
        <select name="produit" id="produit">
          @foreach ($prodo as $item)
              <option value="{{$item->id}}">{{$item->nom}}</option>
          @endforeach
        </select>
        
    </div>

    <div class="group-control">
    <button type="button" class="btn btn-primary" onclick="store_color()">Enter</button>
    </div>
</form>