@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $post->title }}</h1>
                    <div class="mb-2" style='width: 100%; height: 250px;
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
                    <hr>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Add comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comment') }}">
                        @csrf

                        <div class="form-group">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('description') }}</textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input type="hidden" name="post_id" value="{{$post->id}}" />

                            <button type="submit" class="mt-3 btn btn-primary">
                                {{ __('Add comment') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



            @if( ! $post->comments->isEmpty() )
            <div class="card mt-4">
                <div class="card-header">
                    <i class="far fa-comments"></i> Comments ({{count($post->comments)}})
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        @foreach($post->comments as $comment)
                            <div>
                                <a href="/profile/{{ $comment->user->profile->id}}">
                                    <img class="rounded-circle mr-2" style="width: 50px; height: 50px;" src="/storage/{{ $comment->user->profile->image }}">
                                    {{ $comment->user->name }}
                                </a>
                            </div>
                            <div class="mt-2 p-4 card">
                                <a href="/post/{{$comment->post_id}}/#comment/{{ $comment->id }}" name="comment/{{ $comment->id }}" title="link on comment">#</a>
                                <div style="font-size: 12px; color: gray;">{{ $comment->created_at->format('d M Y - H:i:s') }}</div>
                                {{$comment->description }}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
