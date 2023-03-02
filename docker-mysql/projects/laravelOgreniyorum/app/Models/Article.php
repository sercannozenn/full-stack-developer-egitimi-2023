<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

//    protected $table = "articles";
//    protected $fillable = ['title', 'body', 'is_active', 'category_id', 'slug_name'];
    protected $guarded = [];
//    public $timestamps =false;
    protected $visible = ['title', 'body'];
    protected $hidden = ['title', 'body'];
}
