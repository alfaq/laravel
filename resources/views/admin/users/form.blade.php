<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user->email) ? $user->email : old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

    <div class="col-md-6">
        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"  >
            @if( ! $roles->isEmpty() )
                @foreach($roles as $role)
                    @if(isset($user->role->id) && $user->role->id == $role->id)
                        <option selected value="{{ $role->id }}">{{ $role->title }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                    @endif
                @endforeach
            @endif
        </select>

        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
