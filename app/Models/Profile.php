<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function getAvatarAttribute($avatar)
    {
        return asset('storage/avatars/'.$avatar);
    }
}
