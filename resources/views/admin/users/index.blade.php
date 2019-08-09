@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Users') }} (<a href="/dashboard/users/create">{{ __('Add') }}</a>)
        </div>
        <div class="card-body">
            @include('admin.users.search')
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Username') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Role') }}</th>
                    <th scope="col">{{ __('Created') }}</th>
                    <th scope="col">{{ __('Edit') }}</th>
                    <th scope="col">{{ __('Delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @if( ! $users->isEmpty() )
                    @php $ik = 0; @endphp
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ ++$ik }}</th>
                        <td><a target="_blank" href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="/dashboard/users/{{$user->id}}/edit">{{ __('Edit') }}</a></td>
                        <td>
                            <form onclick="return confirm('Are you sure you want to delete this item?')" action="{{ url('/dashboard/users', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-default" type="submit" value="{{ __('Delete') }}" />
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
