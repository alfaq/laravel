@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Profile #{{$user->id}}
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

                    <dl class="row">
                        <dt class="col-sm-2">Name:</dt>
                        <dd class="col-sm-10">{{$user->name}}</dd>

                        <dt class="col-sm-2">Position:</dt>
                        <dd class="col-sm-10">{{ $user->profile->position }}</dd>

                        <dt class="col-sm-2">About me:</dt>
                        <dd class="col-sm-10">{{ $user->profile->about_me }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Posts
                    @can('update', $user->profile)
                        (<a href="/post/create">add post</a>)
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($user->posts as $post)
                            <div class="col-lg-4">
                                <div class="m-1 card">
                                    <img src="/storage/{{$post->image}}" class="card-img-top" alt="{{$post->title}}" style="max-height: 250px; max-width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
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
</div>
@endsection
