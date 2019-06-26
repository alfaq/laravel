@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Posts  (<a href="/dashboard/posts/create">Add</a>)
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @if( ! $posts->isEmpty() )
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td><a target="_blank" href="/post/{{$post->id}}">{{$post->title}}</a></td>
                        <td><a target="_blank" href="/dashboard/categories/{{$post->category->id}}/edit">{{$post->category->title}}</a></td>
                        <td><a target="_blank" href="/dashboard/users/{{$post->user->id}}/edit">{{$post->user->name}}</a></td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="/dashboard/posts/{{$post->id}}/edit">Edit</a></td>
                        <td>
                            <form onclick="return confirm('Are you sure you want to delete this item?')" action="{{ url('/dashboard/posts', ['post' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-default" type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
        </div>
    </div>
@endsection
