<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    
	// 与模型关联的表名   
    protected $table = 'article_house';

    //没有 created_at 和 updated_at 这2个列
    public $timestamps = false;
}
