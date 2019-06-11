@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Roles
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
                @if( ! $roles->isEmpty() )
                    @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role->id}}</th>
                        <td>{{$role->title}}</td>
                        <td>{{$role->created_at}}</td>
                        <td><a href="/dashboard/role/{{$role->id}}/edit">Edit</a></td>
                        <td><a href="/dashboard/profile/{{$role->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
        </div>
    </div>
@endsection
