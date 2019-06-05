@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="far fa-user"></i> Profile #{{$user->id}}
                    @can('update', $user->profile)
                        (<a href="/profile/{{$user->id}}/edit">edit</a>)
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex align-baseline">
                        <div class="mr-4">
                            <img class="rounded-circle" style="width: 120px; height: 120px;" src="/storage/{{ $user->profile->image }}" />
                        </div>
                        <div class="w-100">
                            <div class="row ">
                            <dt class="col-sm-2">Name:</dt>
                            <dd class="col-sm-10">{{$user->name}}</dd>

                            <dt class="col-sm-2">Position:</dt>
                            <dd class="col-sm-10">{{ $user->profile->position }}</dd>

                            <dt class="col-sm-2">About me:</dt>
                            <dd class="col-sm-10">{{ $user->profile->about_me }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="far fa-file-alt"></i> Posts
                    @can('update', $user->profile)
                        (<a href="/post/create">add post</a>)
                    @endcan
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($user->posts as $post)
                            <div class="col-lg-4">
                                <div class="m-1 card">
                                    <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="card-img-top" alt="{{$post->title}}" style="max-height: 250px; max-width: 100%;"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h5>
                                        <p class="card-text">{{$post->description}}</p>
                                        <a href="/post/{{$post->id}}" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="far fa-comments"></i> Comments
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($user->comments as $comment)
                            <div class="pl-4">
                                <h5 class="card-title">{{ $comment->post->title }}</h5>
                                <a href="/post/{{ $comment->post_id }}#comment/{{ $comment->id }}">{{ str_limit($comment->description, $limit = 100, $end = '...') }}</a>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
