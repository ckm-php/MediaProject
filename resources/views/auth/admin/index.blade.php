@extends('layouts.app')

@section('content')
<div class="pull-left">
                <h2 style="margin-left:30%;">Admin Management</h2>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">    
        </div>            
            <div class="pull-right" style="margin-left: 60%;">   
                    <a class="btn btn-primary" href="{{ route('user.create') }}" > Create New Member</a>                               
            </div>
        </div>
    </div>
    
<div class="container">
@if (session('success'))
        <div class="alert alert-success" role="alert">
             {{ session('success') }}
            </div>
    @endif
<table class="table table-bordered" >
        <tr>
            <th>No</th>
            <th style="text-align:center;">UserName</th>
            <th style="text-align:center;">Email</th>
            <th style="text-align:center;">BirthDate</th>
            <th style="text-align:center;width:450px;">Address</th>
            <th style="text-align:center;width:250px">Action</th>
        </tr>
                       
        @foreach ($details as $detail)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $detail->name }}</td>
            <td>{{ $detail->email }}</td>
            <td>{{ $detail->birthdate }}</td>
            <td>{{ $detail->address }}</td>
            <td>           
              <form action="{{ route('user.destroy',$detail->id) }}" method="POST">
   
                    {{-- <a class="btn btn-info" href="{{ route('user.show',$detail->id) }}">Show</a> --}}
    
                    <a class="btn btn-warning" href="{{ route('user.edit',$detail->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach        
    </table>

        <div class="text-center" style="margin-left:30%;">
        {{ $details->links() }}
        </div>       
</div>
@endsection