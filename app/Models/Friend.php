<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    public function profilepic()
    {
        return $this->belongsTo(ProfilePicture::class,'user_Id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_Id');
    }
    public function friendinfo()
    {
        return $this->belongsTo(User::class,'friend_id');
    }

}
