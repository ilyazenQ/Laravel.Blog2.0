<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

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
    public function scopeProductionPaginate($query,$numbers) {
        return $query->with('tags','categories','state')
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->paginate($numbers);
    }
    public function scopeFindByTag($query) {
        return $query->with('tags','categories','state')
        ->where('status',1)
        ->orderBy('created_at','desc')
        ->paginate(10);
    }
    public function scopeFindByCategory($query) {
        return $query->with('tags','categories','state')
        ->where('status',1)
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
        ->where('status',1)
        ->paginate(10);
    }
    public function findRecommend($num) {
        return DB::table('articles')
        ->join('states','articles.id','=','states.article_id')
       ->where('recommend','=',1)
       ->where('status',1)
        ->select('articles.title', 'articles.id', 'articles.preview','articles.slug')
       ->take($num)
       ->get();
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
    public function setNewTags($tags) {
        if($tags == null) {
            return;
        }
        $ids = $this->getTagsIdsFromArray($tags);
        $this->tags()->attach($ids);
    }
    public function setNewCategories($categories) {
        if($categories == null) {
            return;
        }
        $ids = $this->getCategoriesIdsFromArray($categories);
        $this->categories()->attach($ids);
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
        $this->status = 0;
        $this->state->update(['production' => 0]);
        $this->save();
        
        
    }
    public function setPublic(){
        $this->status = 1;
        $this->state->update(['production' => 1]);
        $this->save();
    }
    public function generateNewState() {
        
            $state = new State([
                'likes'=>0,
                'views'=>0,
                'article_id'=>$this->id,
                'recommend'=>0,
                'production'=>0,
            ]);
            $state->save();
        
    }
    public function setProductionState($field) {
        $field = intval($field);
       
        if($field === 0) {
            $this->setDraft();
        } else {
            $this->setPublic();
        }
    }
    public function setNormal() {
        $this->state->update(['recommend' => 0]);
        $this->save();
        
    }
    public function setRecommend(){
        $this->state->update(['recommend' => 1]);
        $this->save();
    }
    public function setRecommendState($field) {
        if(is_null($field)) {
            $this->setNormal();
        } else {
            $this->setRecommend();
        }
    }
    public function remove(){
        // удалить картинку
        $this->removeImage();
        $this->delete();
    }
    public function uploadImage($image) {
        if($image == null) {
            return;
        }
       //$this->removeImage();
        //dd($image->hashName());
    
       // $filename = $image->hashName();
        $path = $image->store('uploads','public');
        //dd($path);
        $this->img = 'storage/'.$path;
        $this->save();
    }
    public function removeImage() {
        if($this->img != null) {
            Storage::delete('/storage/uploads/'.$this->img);
        }
    }
    public static function add($fields) {
        $article = new Article;
        $article->fill($fields);
        $article->save();
        //dd($article->id);
        return $article;
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
