@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2 class="my-4">إضافة منشور</h2>
        @include('alerts.success')
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <select class="form-control" name="category_id">
                    @include('lists.categories')
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="عنوان المنشور" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="body" rows="5">{{old('body')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">صورة المنشور</label>
                <input id="image" type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
    @include('partials.sidebar')
@endsection
