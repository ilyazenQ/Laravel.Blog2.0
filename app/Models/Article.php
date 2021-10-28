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
        return $this->belongsToMany(
            Tag::class
        );
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
    public function setTags($tags) {
        if($tags == null) {
            return;
        }
        $ids = $this->getTagsIdsFromArray($tags);
        $this->tags()->sync($ids);
    }
    public function getTagsIdsFromArray($tags) {
        $ids = [];
        foreach ($tags as $label) {
            $tag = Tag::where('label',$label)->firstOrFail();
            $ids[] = $tag->id;
        }
        return $ids;
    }
    public function setCategories($categories) {
        if($categories == null) {
            return;
        }
        $ids = $this->getCategoriesIdsFromArray($categories);
        $this->categories()->sync($ids);
    }
    public function getCategoriesIdsFromArray($categories) {
        $ids = [];
        foreach ($categories as $label) {
            $category = Category::where('label',$label)->firstOrFail();
            $ids[] = $category->id;
        }
        return $ids;
    }
    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }
    public function setDraft() {
        //dd($this->state->production);
        $this->state->update(['production' => 0]);
        $this->save();
        
    }
    public function setPublic(){
        $this->state->update(['production' => 1]);
        $this->save();
    }
    public function setProductionState($field) {
        $field = intval($field);
        
        if($field === 0) {
            $this->setDraft();
        } else {
            $this->setPublic();
        }
    }
}
