<div class="notif2"></div>
<form method="POST" id="nix">
  <div class="group-control">
     <label for="reference">Reference</label>
     <input type="text" class="form-control" name="reference_cat" value="{{$edito->reference_cat}}">
  </div>

  <div class="group-control">
    <label for="name_cat">Name</label>
    <input type="text" class="form-control" name="name_cat"  value="{{$edito->name_cat}}">
 </div>

 <div class="group-control">
    <label for="desconte">Desconte</label>
    <input type="text" class="form-control" name="desconte_cat"  value="{{$edito->desconte_cat}}">
 </div>

 <div class="group-control">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="photo">
 </div>

 <div class="group-control">
   @if ($edito->photo)
   <img src="{{asset('categorie/'.$edito->photo)}}" alt="" width="70px" height="40px"> 

   @endif
 </div>

 <div class="group-control">
  <button type="button" class="btn btn-primary" onclick="update({{$edito->id}})">Enter</button>
 </div>
</form>

