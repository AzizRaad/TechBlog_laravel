<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','user_id','author'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post_categories(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class,
         Post_Categories::class,
         'post_id', # FK on pivot table
         'id', #pk on category table
         'id', #pk on Post table
         'category_id' # fk on pivot table
        );
    }
}