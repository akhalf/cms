<?php

namespace App\ViewComposers;
use Illuminate\View\View;
use App\Models\Comment;

class CommentComposer
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function compose(View $view)
    {
        return $view->with('resent_comments', $this->comment->with('post')->take(8)->latest()->get());
    }
}
