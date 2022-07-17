@extends('layouts/app')
@section('page-title')
    Создание статьи
@endsection

@section('content')

    <h1>Создание статьи</h1>
    {!! Form::open(['action'=>'ArticlesController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      <div class="form-group mb-3">
        {{Form::label('title','Название статьи')}} 
        {{Form::text('title','',['class'=> 'form-control','placeholder'=>'Введите заголовок'])}}
      </div>
      <div class="form-group mb-3">
        {{Form::label('text','Сама статья')}}    
        {{Form::textarea('text','',['id'=> 'app-ckeditor','placeholder'=>'Введите статью'])}}
      </div>
      {{Form::file('main_image')}}   
      <br><br>
      {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
