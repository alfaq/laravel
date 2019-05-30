@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Post {{$post->id}}</h1>
        <div class="card-body clear">
            <img src="/storage/{{$post->image}}" style="width: 200px; height: auto;"/>
        </div>
    </div>
</div>
@endsection
