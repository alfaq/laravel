@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Edit user') }}
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PATCH')

                @include('admin.users.form')

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save user') }}
                        </button>
                    </div>
                </div>
            </form>

            <p></p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
        </div>
    </div>
@endsection
