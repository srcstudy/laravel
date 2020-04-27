<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public  function article_auth(Request $request){
		//查询并返回一条记录
       /*  $article = Post::where('state', 0)
			     ->orderBy('id', 'asc')->select('id', 'title', 'content', 'state', 'author')
			     ->first();
		dd($article); //$article->id
	    return; */
		
		//更新数据库
		$affected = DB::table('article_house')
           ->where('id', 2)
           ->update(['state' => 1, 'author' => 'test']);
		dd($affected);
		return;
	
    }
}
