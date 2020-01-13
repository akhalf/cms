@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="content bg-white p-4">
            <h4 class="my-2">
                {{ $post->title}}
            </h4>
            <img src="{{ $post->image_path }}" class="card-img-top mb-4" alt="">
            {{ $post->body }}

            <!-- comment -->
            <div class="row form-group mt-5">
                <div class="col-lg-11 col-md-6 col-sm-11">
                    <h3>التعليقات :</h3>
                    <form method="POST" action="{{ route('comment.store') }}" id="comments">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="2" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">تعليق</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="comments" class="word-break container mt-5">
            @foreach($post->comments as $comment )
                @include('comments.post_comments')
            @endforeach
        </div>

    </div>

    @include('partials.sidebar')
@endsection
