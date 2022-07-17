@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Кабинет пользователя</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($articles)>0)
                      @foreach($articles as $el)
                        <div class="alert alert-info">
                          {{$el->title}}
                          <hr>
                          <a href="/articles/{{$el->id}}/edit" class="btn btn-info">Редактировать</a>
                          {!! Form::open(['action'=>['ArticlesController@destroy', $el->id], 'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}} 
                            {{Form::submit('Удалить',['class'=>'btn btn-danger mt-3'])}} 
                          {!! Form::close() !!}
                        </div>
                      @endforeach
                    @else
                      <p>Нет статей</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
