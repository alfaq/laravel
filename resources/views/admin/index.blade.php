@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Welcome!
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
            <div class="admin-count-items">
                <span>{{ $posts }}</span>
                Posts
            </div>
            <div class="admin-count-items">
                <span>{{ $comments }}</span>
                Comments
            </div>
            <div class="admin-count-items">
                <span>{{ $users }}</span>
                Users
            </div>
        </div>
    </div>
@endsection
