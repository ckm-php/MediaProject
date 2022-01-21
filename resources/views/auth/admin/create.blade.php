@extends('layouts.app')

@section('content')
<div class="container">
<div class="pull-left text-left" >
                <h2 style="text-align:center;font-style: italic;">Add New Member</h2>
    </div>

<form action="{{ route('user.store') }}" method="POST">
    @csrf  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>UserName:</strong>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Enter Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                             </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                             </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                             </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BirthDate:</strong>
                <input type="text" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" required autocomplete="birthdate" placeholder="Enter birthdate">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                             </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                             </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12  text-center">
                <button type="submit" class="btn btn-primary">save</button>
        </div>
    </div>
   
</form>
@endsection