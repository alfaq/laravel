@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <img src="/storage/{{$post->image}}" style="width: 200px; height: auto;"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
