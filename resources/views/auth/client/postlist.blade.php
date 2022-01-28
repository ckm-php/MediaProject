@extends('layouts.app')

@section('content')
<div class="pull-left">
                <h2 style="margin-left:30%;">Post User Management</h2>
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
            <th style="text-align:center;">Title</th>
            {{-- <th style="text-align:center;">Image</th> --}}
            <th style="text-align:center;">Action</th>
        </tr>
                       
        @foreach ($posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->post_title }}
            {!! $post->post_description !!}</td>
            {{-- <td>{{ $post->image }}</td> --}}
            <td>
                <form action="{{ route('client.delete',$post->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('client.view',$post->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                </form>
                {{-- <a href="{{ route('client.view', $post->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('client.delete', $post->id) }}" class="btn btn-danger">delete</a> --}}
            </td>
            
            </td>
        </tr>
        @endforeach        
    </table>

        <div class="text-center" style="margin-left:30%;">
        {{ $posts->links() }}
        </div>       
</div>
@endsection