@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card border-0 p-5" style="border-radius:25px; max-height:600; width:700px">
            <h3 class="font-weight-bold">Modifier votre Tweet</h3>
            {!! Form::open(['action' => ['TweetController@update', $tweet->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Titre') !!}
                {!! Form::text('title', $tweet->title, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Contenu') !!}
                {!! Form::textarea('content', $tweet->content, ['class' => 'form-control', 'rows'=>'3']) !!}
            </div>
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Enregistrer', ['class'=>'btn btn-outline-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
