<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class PostController extends Controller
{
    use ImageUploadTrait;
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post::with('user:id,name')->approved()->paginate(5);

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
            $image_name = $this->uploadImage($request->image);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image_path' => $image_name ?? 'default.jpg',
        ]);
        return back()->with('success', 'تم إضافة المنشور');

        // to return text from lang file using trans()
        //return back()->with('success', trans('alerts.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_unless( (auth()->user()->can('edit-post', $post)),403);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->hasFile('image')){
            $image_name = $this->uploadImage($request->image);
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id,
                'image_path' => $image_name ?? 'default.jpg',
            ]);
        }
        else{
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id,
            ]);
        }

        return back()->with('success', 'تم تعديل المنشور');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function getByCategory($id)
    {
        $posts = $this->post::with('user:id,name')->whereCategory_id($id)->approved()->paginate(5);

        return view('index', compact('posts'));

    }

    public function search(Request $request)
    {
        $posts = $this->post::where('body', 'LIKE', '%'. $request->keyword .'%')->with('user:id,name')->approved()->paginate(5);

        return view('index', compact('posts'));
    }
}
