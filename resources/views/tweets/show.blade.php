@extends('layouts.app')

@section('content')
    <!-- RETOUR EN ARRIERE -->
    <div class="d-flex justify-content-start">
        <a href="/tweet/" class="link-sm" style="text-decoration: none"> &lt; Revenir</a>
    </div>
    <!-- FIN RETOUR EN ARRIERE -->
    <!--CONTAINER TWEET -->
        <div class="container d-flex justify-content-center">
            <div class="card border-0" style="border-radius:25px; max-height:100%; width:600px">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-md-12">
                            @if (Auth::user()->id == $tweet->user_id)
                                <p class="badge badge-primary font-weight-bold badge-lg text-white" style="font-size:13px"> {{ $tweet->user->name }}</p>
                            @else
                                <p class="badge badge-success font-weight-bold badge-lg text-white" style="font-size:13px"> {{ $tweet->user->name }}</p>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3" style="margin-top: -10px; ">
                            <small class="text-primary text-bold">Publié le {{ $tweet->created_at->format('d/m/Y à H:m') }} </small>
                        </div>
                    </div>
                    <h5 class="card-title">
                        <h3><a href="/tweet/{{ $tweet->id}}" class="link text-bold" style="text-decoration: none; color:black; font-weight:bold"> {{ $tweet->title }} </a></h3>
                    </h5>
                    <p class="card-text">{{ $tweet->content }}</p>
                </div>
                @if (Auth::user()->id == $tweet->user_id)
                    <div class="d-flex justify-content-start align-items-center ml-4 mb-4">
                        <a href="/tweet/{{ $tweet->id }}/edit" class="btn btn-light m-2">Modifier</a>
                        <div>
                            {!! Form::open(['action' => ['TweetController@destroy', $tweet->id], 'method'=>'POST', 'class'=> 'm-2']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Supprimer', ['class'=> 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    <!-- FIN DU CONTAINER TWEET -->

    <!--CONTAINER DES COMMENTAIRES -->
        <div class="container d-flex justify-content-center my-3">
            <div class="card border-0" style="max-height:100%; width:600px">
                <div class="card-body m-3">
                    <h5 class="card-title">
                        <h3 class="text-bold">Commentaires</h3>
                    </h5>
                    @forelse ($tweet->comments as $comment)
                        <div class="card border-grey my-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-start">
                                    @if (Auth::user()->id == $comment->user_id)
                                        <p class="badge badge-primary mr-3 font-weight-bold badge-lg text-white" style="font-size:13px"> {{ $comment->user->name }}</p>
                                    @else
                                        <p class="badge badge-success mr-3 font-weight-bold badge-lg text-white" style="font-size:13px"> {{ $comment->user->name }}</p>
                                    @endif
                                        <small class="text-dark text-bold font-italic" style="font-size:11px">Commenté le {{ $comment->created_at->format('d/m/Y ') }} </small>

                                </div>
                                <p class="card-text">{{$comment->content}}</p>
                            </div>
                            <!-- CONTAINER REPONSE COMMENTAIRE -->
                                @foreach ($comment->comments as $replyComment)
                                    @if (Auth::user()->id == $replyComment->user_id)
                                        <div class="card-body mx-5 my-2" style="border:1px rgb(63, 130, 232) solid; border-radius:25px;">
                                    @else
                                        <div class="card-body mx-5 my-2" style="border:1px rgb(13, 112, 38) solid; border-radius:25px">
                                    @endif
                                            <div class="d-flex justify-content-start">
                                                @if (Auth::user()->id == $replyComment->user_id)
                                                    <p class="badge badge-primary mr-3 font-weight-bold badge-lg text-white" style="font-size:13px;"> {{ $replyComment->user->name }}</p>
                                                @else
                                                    <p class="badge badge-success mr-3 font-weight-bold badge-lg text-white" style="font-size:13px"> {{ $replyComment->user->name }}</p>
                                                @endif
                                                    <small class="text-dark text-bold font-italic" style="font-size:11px">Répondu le {{ $replyComment->created_at->format('d/m/Y') }} </small>

                                            </div>
                                            <p class="card-text">{{$replyComment->content}}</p>
                                        </div>
                                @endforeach
                                <div class="px-3 pb-3 ">
                                    {!! Form::open(['action' => ['CommentController@storeReply', $comment], 'method'=>'POST', 'class'=> 'm-2 form-inline']) !!}
                                    <div class="form-group">
                                        {!! Form::textarea('replyComment', '', ['class' => 'form-control mr-2','cols'=>'40', 'rows'=>'1', 'placeholder' =>'Votre réponse...']) !!}
                                    </div>
                                    @if (Auth::user()->id )
                                        {!! Form::submit('Répondre', ['class'=> 'btn btn-primary btn-sm']) !!}
                                    @endif

                                    {!! Form::close() !!}
                                </div>
                            <!--FIN REPONSE AU COMMENTAIRES -->
                        </div>
                    @empty
                        <div class="alert alert_info">Aucun commentaire pour ce Tweet</div>
                    @endforelse
                </div>
                @if (Auth::user()->id )
                    <div class="px-4 pb-4">
                        {!! Form::open(['action' => ['CommentController@store', $tweet], 'method'=>'POST', 'class'=> 'm-2']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', '', ['class' => 'form-control', 'rows'=>'3', 'placeholder' =>'Votre commentaire ...']) !!}
                        </div>
                        {!! Form::submit('Commenter', ['class'=> 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    <!-- FIN CONTAINER COMMENTAIRES -->

@endsection
