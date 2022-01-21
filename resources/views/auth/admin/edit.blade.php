@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pull-left text-left" >
     <h2 style="text-align:center;font-style: italic;">Edit Member</h2>
        </div>
        <div class="pull-right text-right">
            <a class="btn btn-primary" href="{{ route('user.list') }}"> Back</a>
        </div>
</div>
<div class="container">

    <form action="{{ route('user.update',$user->id) }}" method="POST">
        @csrf  
        @method('patch')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>UserName:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control " required placeholder="Enter Name">               
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="name" value="{{ $user->password }}" class="form-control " required placeholder="Enter Name">               
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" required placeholder="Enter Age">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>BirthDate:</strong>
                    <input type="text" name="birthdate" value="{{ $user->birthdate }}" class="form-control" required placeholder="Enter birthdate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{ $user->address }}" class="form-control" required placeholder="Enter Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
       
    </form>
</div>
@endsection