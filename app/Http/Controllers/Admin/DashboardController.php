<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Category,
    Comment,
    Post,
    User
};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index')
            ->with([
                'posts_count' => Post::count(),
                'users_count' => User::count(),
                'comments_count' => Comment::count(),
                'categories_count' => Category::count(),
            ]);
    }
}
