@extends('base2')

@section('emo')
   <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Default</li>
        <li class="breadcrumb-item"><a href="{{url('template/all_commande_user_checkout')}}">All SHIPPING</a></li>

    </ol>
    <div class="card">
        <div class="card-header">UPDATE_ADRESS_USER</div>
        <div class="card-body">
            <form method="POST" id="linkx">
                <div class="row">
                    <div class="col-sm-6">
                        <label>First Name *</label>
                        <input type="text" class="form-control"  name="firstname" value="{{session('info_user')[0]->firstname}}" required>
                    </div><!-- End .col-sm-6 -->
        
                    <div class="col-sm-6">
                        <label>Last Name *</label>
                        <input type="text" class="form-control" name="name" value="{{session('info_user')[0]->name}}"required>
                    </div><!-- End .col-sm-6 -->
                </div><!-- End .row -->
        
                <label>Country *</label>
                <input type="text" class="form-control" name="country"  value="{{session('info_user')[0]->country}}" required>
                <small class="form-text" ></small>

                <label>State *</label>
                <input type="text" class="form-control"  name="state" value="{{session('info_user')[0]->state}}" required>
                <small class="form-text"></small>
        
                <label>City *</label>
                <input type="text" class="form-control"  name="city" value="{{session('info_user')[0]->city}}" required>
                <small class="form-text"></small>
        
                <label>Rue*</label>
                <input type="text" class="form-control" name="rue" value="{{session('info_user')[0]->rue}}" required>
                <small class="form-text"></small>
        
                <label>Zip_cod *</label>
                <input type="text" class="form-control"  name="codzip" value="{{session('info_user')[0]->codzip}}" required>
                <small class="form-text"></small>
        
                <label>Tel *</label>
                <input type="text" class="form-control" name="tel"  value="{{session('info_user')[0]->tel}}" required>
                <small class="form-text"></small>
        
                <label>Email address *</label>
                <input type="email" class="form-control" name="email" value="{{session('info_user')[0]->email}}"required>
        
        
                <button type="button" class="btn btn-outline-primary-2" onclick="update_adress_useryy({{$upo->id}})">
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

