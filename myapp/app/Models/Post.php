<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    //fillableでpostsテーブルの情報を取得できるようにする
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'created_at',
        'updated_at',
    ];
}
