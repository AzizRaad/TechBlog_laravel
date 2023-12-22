<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Categories extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    public $timestamps = false;

    protected $fillable = ['category_id','post_id'];
}
