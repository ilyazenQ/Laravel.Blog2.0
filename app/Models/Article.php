<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'preview',
        'body',
        'img',
        'slug'
    ];
    public function comments() {
        return $this->hasMany(Comment::class);
        // Article может иметь много comment
    }
    public function state() {
        return $this->hasOne(State::class);
        // Имеет одно состояние
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
        // Имеет много tags
    }
}
