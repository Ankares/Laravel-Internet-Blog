@extends('layouts/app') 

@section('page-title')

    {{$title}}

@endsection      

@section('content') 

    <h1>О нас!</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora ab, totam delectus. Quae cum, libero voluptatibus, perspiciatis itaque est dolore.</p>

    @if(count($params)>0)
      <ul class="list-group">
        @foreach($params as $el)
          <li class="list-group-item">
            {{$el}}                    
          </li>
        @endforeach
      </ul>
    @endif

@endsection    
