@extends('layouts/app')
@section('page-title')
    Статья на сайте
@endsection

@section('content')

    <h1>{{$data['article']->title}}</h1>
    <div>
      <p>{!! $data['article']->text !!}</p> 
      <p>Дата создания: {{$data['article']->created_at}}</p>
    </div>
    <a href="/articles" class="btn btn-warning mb-3">Назад</a>

    @if(count($data['comments'])>0)
      @foreach($data['comments'] as $comm)
        <div class="alert alert-info">
          {{$comm->comment}}
        </div>
      @endforeach
    @endif

    <h1>Форма комментариев</h1>
    {!! Form::open(['action'=>'ArticlesController@store','method'=>'POST']) !!}
    <div class="form-group">
      {{ Form::label('comment','Комментарий') }}
      {{ Form::textarea('comment', '', ['class'=>'form-control','placeholder'=>'Введите комментарий']) }}
    </div>
   
    {{ Form::hidden('article_id', $data['article']->id) }}
    {{ Form::submit('Добавить',['class'=>'btn btn-success mt-3']) }}
    {!! Form::close() !!}

    @if(!Auth::guest())
      @if(Auth::user()->id == $data['article']->user_id)
        <hr>
        <a href="/articles/{{$data['article']->id}}/edit" class="btn btn-warning">Редактировать</a> 

        {!! Form::open(['action'=>['ArticlesController@destroy', $data['article']->id], 'method'=>'POST']) !!}
          {{Form::hidden('_method','DELETE')}}
          {{Form::submit('Удалить',['class'=>'btn btn-danger mt-3'])}}
        {!! Form::close() !!}
      @endif
    @endif
@endsection
