@extends('layouts/app')

@section('page-title')

    Магазин

@endsection

@section('content')

    <h1>Товары</h1>
    @if(count($items)>0)
     @foreach($items as $el)
    <div class="alert alert-info">
      <h4>{{$el->name}}</h4>
      <p>{{$el->description}}</p>
      <p><b>Цена:</b> {{$el->price}} рублей</p>
      <a href="/items/{{$el->id}}" class="btn btn-success">Детальнее</a>
    </div>
    @endforeach
    @endif
@endsection
