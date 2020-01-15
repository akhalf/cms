@includeWhen(!count($contents->posts), 'alerts.empty', ['msg' => 'لا توجد مشاركات بعد'])
<div class="row mb-2">
    @foreach($contents->posts as $post)
        <div class="col-lg-3 col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h5>
                </div>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle link" data-toggle="dropdown">
                    <span>المزيد</span>
                </a>
                <div class="dropdown-menu">
                    @can('edit-post', $post)
                        <a class="dropdown-item" href="{{ route('post.edit', $post->id) }}">تعديل</a>
                    @endcan
                    @can('delete-post', $post)
                        <a class="dropdown-item" href="{{ route('post.destroy', $post->id) }}">حذف</a>
                    @endcan
                </div>
            </div>
        </div>
    @endforeach
</div>
