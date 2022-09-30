<table class="table">
    <thead>
        <tr>
            <th>COULEURS</th>
            <th>PRODUIT</th>
            <th>ACTION</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>COULEURS</th>
            <th>PRODUIT</th>
            <th>ACTION</th>
        </tr>
    </tfoot>

    <tbody>
        @foreach ($show_color as $item)
        <tr>
            <td>{{$item->nom_couleur}}</td>
            <td>@foreach ($item as $couleur)
                {{$couleur->produit->nom}}
            @endforeach</td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>

        </tr>
        @endforeach
    </tbody>
</table>