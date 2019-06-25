@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Categories  (<a href="/dashboard/categories/create">Add</a>)
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @if( ! $categories->isEmpty() )
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a target="_blank" href="/profile/{{$category->id}}">{{$category->title}}</a></td>
                        <td>{{$category->created_at}}</td>
                        <td><a href="/dashboard/categories/{{$category->id}}/edit">Edit</a></td>
                        <td>
                            <form onclick="return confirm('Are you sure you want to delete this item?')" action="{{ url('/dashboard/categories', ['category' => $category->id]) }}" method="post">
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
