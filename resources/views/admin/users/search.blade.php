<form method="GET" action="{{ route('users.index') }}">
    @csrf
    <div class="form-group row mb-4">
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6 p-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Search') }}
            </button>
            <a href="/dashboard/users">{{ __('Clear') }}</a>
        </div>

    </div>
</form>
