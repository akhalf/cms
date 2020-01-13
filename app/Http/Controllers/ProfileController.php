<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByUser($id)
    {
        $contents = $this->user->with('profile', 'posts')->find($id);

        return view('user.profile', compact('contents'));
    }

    public function getCommentsByUser($id)
    {
        $contents = $this->user->with('profile', 'comments.post')->find($id);

        return view('user.profile', compact('contents'));
    }
}
