<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = [
        'category_name', 
    ];

    public function article()
    {
        return $this->hasMany('App\Article');
    }
}
