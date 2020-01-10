@extends('layouts.app')

@section('content')
    <div class="col-md-8 bg-white">
        <h2 class="my-4">المنشورات</h2>
        @forelse($posts as $post)
            <div class="card mb-4">
                <img src="{{ $post->image_path }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ Str::limit($post->body, 200, '...إلخ') }}</p>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">المزيد</a>
                </div>
                <div class="card-footer text-muted">
                    {{ $post->created_at->diffForHumans() }}
                    بواسطة: <a href="" class="">{{ $post->user->name }}</a>
                </div>
            </div>
        @empty
            @include('alerts.empty', ['msg' => 'لا توجد منشورات'])
        @endforelse

        <ul class="pagination justify-content-center mb-4">
            {{ $posts->links() }}
        </ul>
    </div>
    @include('partials.sidebar')
@endsection
