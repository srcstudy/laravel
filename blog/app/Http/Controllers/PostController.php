<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;


class PostController extends Controller
{
    public  function article_auth(Request $request){
		//查询并返回一条记录
        $article = Post::where('state', 0)
			     ->orderBy('id', 'asc')->select('id', 'title', 'content', 'state', 'author')
			     ->first();
		dd($article);
	    return;
		
	
    }
}
