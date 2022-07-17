@extends('layouts/app')

@section('page-title')

    Товар

@endsection

@section('content')
<a href="/shop" class="btn btn-info mb-3">Назад</a>
<div class="alert alert-primary">
  <h4>{{$item->name}}</h4>
  <p>{{$item->description}}</p>
  <p><b>Цена:</b> {{$item->price}} рублей</p>
  <button class="btn btn-info">Купить</button>
</div>

@endsection
