@extends('layouts/app')
@section('page-title')
    Редактирование статьи
@endsection

@section('content')

    <h1>Редактирование статьи</h1>
    {!! Form::open(['action'=>['ArticlesController@update',$article->id],'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      <div class="form-group mb-3">
        {{Form::label('title','Название статьи')}} 
        {{Form::text('title', $article->title, ['class'=> 'form-control','placeholder'=>'Введите заголовок'])}}
      </div>
      <div class="form-group mb-3">
        {{Form::label('text','Сама статья')}}    
        {{Form::textarea('text', $article->text, ['id'=> 'app-ckeditor','placeholder'=>'Введите статью'])}}
      </div>
      {{Form::hidden('_method','PUT')}}   
      {{Form::file('main_image')}}  
      {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
