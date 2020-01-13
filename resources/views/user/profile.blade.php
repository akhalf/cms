@extends('layouts.app')

@section('content')
<div class="container text-muted">
    <div class="row bg-white p-3 mb-4">
        <div class="col-md-3 text-center">
            <img class="profile mb-2" src="{{ $contents->profile->avatar }}">
        </div>

        <div class="col-md-9 text-md-right text-center">
            <h2>{{ $contents->name }}</h2>
            <p class="text-wrap">{{ $contents->profile->bio }}</p>
            <a href="">{{ $contents->profile->website }}</a>
        </div>
    </div>

    <div class="row p-3">
        <div class="col-md-12">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link {{$contents->relationLoaded('posts') ? 'active' : ''}}" href="{{ route('profile', $contents->id) }}">المشاركات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$contents->relationLoaded('comments') ? 'active' : ''}}" href="/user/{{ $contents->id }}/comments">التعليقات</a>
                </li>
            </ul>

            @if($contents->relationLoaded('posts'))
                @include('user.posts_section')
            @else
                @include('user.comments_section')
            @endif
        </div>
    </div>
</div>

@endsection
