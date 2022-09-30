@extends('base2')

@section('emo')
   <div class="container">
    <div class="card">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
            <li class="breadcrumb-item"><a href="{{url('template/all_commande_user_checkout')}}">All SHIPPING</a></li>

        </ol>
        <div class="card-header">UPDATE_ADRESS_USER</div>
        <div class="card-body">
            <form method="POST" id="anxzip">
                
            <div class="custom-control custom-checkbox">
                    <label>Ship to a different address? (optional)</label>
                    <textarea class="form-control" name="adresscommande" placeholder="Notes about your order, e.g. special notes for delivery">{{$upa->adresscommande}}</textarea> 
                </div><!-- End .custom-checkbox -->
                
                   <button type="button" class="btn btn-outline-primary-2" onclick="update_shipping_adress2({{$upa->id}})">
                    <span>SAVE CHANGES</span>
                    <i class="icon-long-arrow-right"></i>
                </button>
            </form>
        </div>
        </div>
    </div>
  

  @section('scripts')
  @endsection  
@endsection