@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if( ! $categories->isEmpty() )
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-list-alt"></i> Category
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item"><a href="/category/{{ $category->id }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if( ! $users->isEmpty() )
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-address-card"></i> New users
                    </div>
                    <ul class="list-group list-group-flush">
                    @foreach($users as $user)
                        <li class="list-group-item"><a href="/profile/{{ $user->id }}">{{ $user->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endif

                @if( ! $comments->isEmpty() )
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-comments"></i> New comments
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($comments as $comment)
                            <li class="list-group-item"><a href="/post/{{ $comment->post_id }}#comment/{{ $comment->id }}">{{ str_limit($comment->description, $limit = 100, $end = '...') }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-8">
                @if( ! $posts->isEmpty() )
                    <ul class="list-group list-group-flush">
                        @foreach($posts as $post)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
                                    <div class="mb-2" style='width: 100%; height: 200px;
                                            background: url("/storage/{{ $post->image }}");
                                            background-repeat: no-repeat;
                                            background-size: cover;
                                            background-position: 50%;'>
                                    </div>
                                    <div class="card-text mb-2">
                                        <a href="/category/{{ $post->category->id }}" style="color: gray; font-size: 12px;"><i class="far fa-list-alt"></i> {{ $post->category->title }}</a>
                                        <span class="ml-2" style="color: gray; font-size: 12px;"><i class="far fa-clock"></i> {{  $post->created_at->format('d M Y - H:i:s') }}</span>
                                        <span class="ml-2" style="color: gray; font-size: 12px;"><i class="far fa-eye"></i> 32 </span>
                                        <span class="ml-2" style="color: gray; font-size: 12px;"><i class="far fa-comments"></i> {{count($post->comments)}} </span>
                                        <a href="/profile/{{$post->user->id}}" class="ml-2" style="color: gray; font-size: 12px;"><i class="far fa-user"></i> {{$post->user->name}}</a>
                                    </div>
                                    <div class="card-text">{{ $post->description }}</div>
                                    <div class="text-right"><a href="/post/{{ $post->id }}"><i class="fas fa-angle-right"></i> Read more...</a></div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection