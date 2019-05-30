@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a href="/post/create">Add new post</a>
                    </div>

                    <div>Name: {{$user->name}}</div>
                    <div>Position: {{ $user->profile->position }}</div>
                    <div>About me: {{ $user->profile->about_me }}</div>

                    <div>
                        @foreach($user->posts as $post)
                            <div class="row">
                                <div class="col-12">
                                    <div><h3>{{$post->title}}</h3></div>
                                    <div>{{$post->description}}</div>
                                    <div><img src="/storage/{{$post->image}}" style="width: 150px; height: 80px;"/></div>
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
