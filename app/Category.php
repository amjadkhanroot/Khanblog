<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles(){
        return $this->belongsToMany(Article::class, 'category_articles',
            'category_id', 'article_id');
    }
}
