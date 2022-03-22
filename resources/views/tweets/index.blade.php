@extends('layouts.app')

@section('content')
    <div class="container">

            @if (count($tweets) > 0)
                @foreach ($tweets as $tweet)
                    <div class="card mt-2 border-0 rounded-50 " >
                        <div class="card-body">
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
                    </div>
                @endforeach
            @else
                <div class="jumbottron">
                    <p class="h3">Oups, il n'y a pas de Tweets...</p>
                </div>
            @endif

        <div class="d-flex justify-content-center align-items-center my-3">
            {{ $tweets->links() }}
        </div>
    </div>

@endsection
