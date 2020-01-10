@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="content bg-white p-5">
            <h4 class="my-4">
                {{ $post->title}}
            </h4>
            <img src="{{ $post->image_path }}" class="card-img-top mb-4" alt="">
            {{ $post->body }}
        </div>
    </div>

    @include('partials.sidebar')
@endsection
