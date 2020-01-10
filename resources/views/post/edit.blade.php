@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2 class="my-4">تعديل منشور</h2>
        @include('alerts.success')
        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <select class="form-control" name="category_id">
                    @include('lists.categories')
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="عنوان المنشور" value="{{old('title', $post->title)}}">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="body" rows="5">{{old('body', $post->body)}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">صورة المنشور</label>
                <img src="{{ $post->image_path }}" class="form-control w-25 h-25">
                <input id="image" type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>

    @include('partials.sidebar')
@endsection
