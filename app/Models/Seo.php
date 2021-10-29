<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'title',
    'keywords',
    'article_id',
    'description'
    ];

}
