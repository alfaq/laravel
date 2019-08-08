@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Users (<a href="/dashboard/users/create">Add</a>)
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @if( ! $users->isEmpty() )
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td><a target="_blank" href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="/dashboard/users/{{$user->id}}/edit">Edit</a></td>
                        <td><a href="/dashboard/users/{{$user->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
        </div>
    </div>
@endsection
