@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit post
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('dashboard.posts.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title ? $post->title : '' }}" autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror"  >
                            @if( ! $categories->isEmpty() )
                                @foreach($categories as $category)
                                    @if($category->id == $post->category->id)
                                        <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ $post->description ? $post->description : '' }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        @if($post->image)
                            <div>
                                <img style="max-width: 100%;" src="/storage/{{$post->image}}">
                            </div>
                        @endif
                        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" autocomplete="image" value="">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save post') }}
                        </button>
                    </div>
                </div>
            </form>

            <p></p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur consequuntur dolore doloremque, doloribus dolorum error esse impedit molestiae nostrum optio, quasi quia reiciendis sapiente ut veniam voluptas voluptates voluptatum!</p>
        </div>
    </div>
@endsection
