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
    public function categories() {
        return $this->belongsToMany(Category::class);

    }

    public function scopeLastLimit($query,$num) {
        return $query->with('tags','categories','state')
        ->orderBy('created_at','desc')
        ->take($num)
        ->get();
     }
     
     public function createdAtForHumans(){
        return $this->created_at->diffForHumans();
    }

    public function scopeAllPaginate($query,$numbers) {
        return $query->with('tags','categories','state')
        ->orderBy('created_at','desc')
        ->paginate($numbers);
    }
    public function scopeFindByTag($query) {
        return $query->with('tags','categories','state')
        ->orderBy('created_at','desc')
        ->paginate(10);
    }
    public function scopeFindByCategory($query) {
        return $query->with('tags','categories','state')
        ->orderBy('created_at','desc')
        ->paginate(10);
    }
    public function scopeFindBySlug($query,$slug) {
        return $query->with('tags','categories','state')
        ->where('slug',$slug)
        ->firstOrFail();
    }
    public function scopeFindBySearch($query,$search) {
        return $query->with('tags','categories','state')
        ->where('title','like',"%{$search}%")
        ->paginate(10);
    }
    public function isProduction() {
        return $this->state->production === 1? true:false;
    }
    public function isRecommend() {
        return $this->state->recommend === 1? true:false;
    }
}
