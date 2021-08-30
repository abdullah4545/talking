<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'postVideo  ', 'post_Id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    
}
