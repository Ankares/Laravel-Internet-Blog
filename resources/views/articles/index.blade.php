@extends('layouts/app')
@section('page-title')
    Статьи на сайте
@endsection

@section('content')

    <h1>Статьи</h1>
    @if(count($articles) > 0)
      @foreach($articles as $el)    
        <div class="well">
          <img src="/storage/img/{{$el->image}}" alt="image" class="img-thumbnail mb-3" style='max-width:300px'>
          <a href="/articles/{{$el->id}}"><h3>{{$el->title}}</h3></a>
          <p>Последнее обновление: {{$el->updated_at}}</p>
          <p>Автор: <b>{{$el->user->name}}</b></p>
        </div>
      @endforeach
    @else
      <p>Статей нет</p>
    @endif

@endsection
