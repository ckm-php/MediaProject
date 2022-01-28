@extends('layouts.app')

@section('content')
 

  
  <div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="card" >
    {{-- <p class="card-img-top">{!! $post->post_image !!}</p> --}}
             <img class="card-img-top" src="{{asset('user_profiles/'.$post->post_imge)}}" alt="Card image" style="width:100%;height:200px;">
                <div class="card-body" > 
                    <h4 class="card-title">{{ $post->post_title }}</h4>
                    <p class="card-text">{!! $post->post_description !!}</p>
                    {{-- <a href="#" class="btn btn-primary">See Profile</a> --}}
                    <a href="" class="btn btn-outline-success btn-sm">Read More</a>
                    <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                </div>
            </div>
        </div>
        @endforeach   
   </div>
  </div>
  

  @endsection
