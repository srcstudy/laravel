<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    public  function article_auth(Request $request){
		//查询并返回一条记录
        $article = Post::where('state', 0)
			     ->orderBy('id', 'asc')->select('id', 'title', 'content', 'state', 'author')
			     ->first();
	
		
		//更新数据库
		/* $affected = DB::table('article_house')
           ->where('id', $article->id)
           ->update(['state' => 1, 'author' => 'test']);		
		 */
		 
		//获取认证用户
        $user = Auth::user();
        $user_name = $user->name;

        Post::where('id', $article->id)->update(['state' => 1, 'userid' => $user_name]);

		//$json = '{"企业动态":"16835","投资理财":"1525","财经人物":"2724"}';
        // $json_arr = json_decode($json, TRUE);
       	//得到每个分类的值，包括值为0的分类
		$result = array();
		if (Cache::has('tag_info')) {		
			$value  = Cache::get('tag_info');
			$result = json_decode($value, TRUE);			
		}else{			
			$tag_name = config('article.house_category_info.tag_names');//获取配置值
			$tag_name_arr = explode(' ', $tag_name);
			//数据库中获取的，没有值为0的分类
		    $articles = DB::select('SELECT tag_type, COUNT( * ) as num FROM  `article_house` WHERE state =? GROUP BY tag_type', [2]);
		 
			$json_arr = array();
			foreach ($articles as $item) {
				$json_arr[$item->tag_type] = $item->num;
			}
		   
			foreach ($tag_name_arr as $_tag_name){
				$result[$_tag_name] = '_0';//默认为0条
				foreach ($json_arr as $json_name => $json_value){
					if(!strcasecmp($json_name, $_tag_name)){
						$result[$_tag_name] = '_'.$json_value;
					}
				}
			}

			$result_json = json_encode($result);			
			Cache::put('tag_info', $result_json, 10);			
		}
		
		
		////////////
		//得到每个用户的值
		$user_datas_arr = array();
		if (Cache::has('user_info')) {			
			$value = Cache::get('user_info');
			$user_datas_arr = json_decode($value, TRUE);
		}else{			
			$user_datas = DB::select('SELECT userid, COUNT( * ) as num FROM  `article_house` WHERE state =? GROUP BY userid', [2]);		  
			
			foreach ($user_datas as $item) {
				$user_datas_arr[$item->userid] = $item->num;
			}
			$result_json = json_encode($user_datas_arr);
			Cache::put('user_info', $result_json, 10);			
		}
	
		return view('post', ['id'=> $article->id, 'title' => $article->title, 'content' => $article->content, 
							         'username' => $user_name, 
									 'tag_name_arr' => $result, 
									 'user_datas' => $user_datas_arr] );
    }
}
