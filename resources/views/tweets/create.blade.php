@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card border-0 p-5" style="border-radius:25px; max-height:600; width:700px">
            <h3 class="font-weight-bold">Créer votre Tweet</h3>
            {!! Form::open(['action'=>'TweetController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Titre', ['class'=>'']) !!}
                {!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Eciver le titre de votre tweet']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Contenu', ['class'=>'']) !!}
                {!! Form::textarea('content', '', ['class'=>'form-control', 'rows'=>'3','placeholder'=>'Eciver le contenu de votre tweet']) !!}
            </div>
            {!! Form::submit('publier', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
