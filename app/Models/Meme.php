<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meme extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('id','desc');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->diffForHumans();
    }

}
