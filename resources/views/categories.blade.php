@extends('layouts.main')
@section('container')
<h1>{{ $title }}</h1>

<div class="container">
   <div class="row">
      @foreach ($categories as $ct)
      <div class="col-md-4">
         <a href="/categories/{{ $ct->slug }}">

            <div class="card bg-dark text-white">
               <img class="card-img-top" src="https://source.unsplash.com/500x500?{{ $ct->name }}" alt="{{ $ct->name }}">
               <div class="card-img-overlay d-flex align-items-center p-0 ">
                  <h5 class="card-title text-center flex-fill p-4" style="background-color:rgba(0,0,0,0.7)">{{ $ct->name }}</h5>
               </div>
            </div>
         </a>
         </div>
      @endforeach
   </div>
</div>
   

@endsection

