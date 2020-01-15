<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;

    public function __construct(Post $post)
    {
        return $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->with('user', 'category')->paginate(10);

        return view('admin.posts.all', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request['approved'] = $request->has('approved');
        $this->post->find($id)->update($request->all());

        return back()->with(['success' => 'تم حفظ البيانات']);
    }

    public function destroy($id)
    {
        //
    }
}
