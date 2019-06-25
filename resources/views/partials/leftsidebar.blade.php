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