<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">CATEGORIE</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><button type="button" class="btn btn-danger voxa">DELETE_MULTIPLE</button></th>
                            <th>REFERENCE</th>
                            <th>NAME</th>
                            <th>DESCONTE</th>
                            <th>IMAGES</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><button type="button" class="btn btn-danger voxa">DELETE_MULTIPLE</button></th>

                            <th>REFERENCE</th>
                            <th>NAME</th>
                            <th>DESCONTE</th>
                            <th>IMAGES</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach ($show_cat as $item)
                       <tr>
                        <td><input type="checkbox" class="goz" value="{{$item->id}}"></td>
                        <td>{{$item->reference_cat}}</td>
                        <td>{{$item->name_cat}}</td>
                        <td>{{$item->desconte_cat}}%</td>
                        <td><img src="{{asset('categorie/'.$item->photo)}}" alt="" width="70px" height="40px"></td> 
                        <td>
                            <button type="button" class="btn btn-warning" onclick="edit({{$item->id}})">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="deletet({{$item->id}})">Delete</button>
                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>