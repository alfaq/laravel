@extends('layouts.app')

@section('content')
    @if( ! $posts->isEmpty() )
        <div class="list-group list-group-flush">
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
        </div>
        {{ $posts->links() }}
    @endif
@endsection