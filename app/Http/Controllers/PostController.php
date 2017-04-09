<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//Import Post model to the controller
use App\Post;
use App\User;
use DB;

class PostController extends Controller
{
    /**
    *   Function to create a post 
    *   the parameters doesn't matter for now
    */
    public function create_post(Request $request)
    {   
    	$user = $request->user();
        $filter_type = 1; 
    	//If the user is not registerd 
        if($user == NULL){
            $posts = Post::all();
            Post::create([
	            'title' => $request['title'],
	            'content'=> $request['content'],
                'category'=> $request['category'],
        	]);
        	$posts = Post::all();
            
        	return view('post.post_page',compact('posts','filter_type'));

        }
        //If the user is registerd 
        else{
        	$posts = Post::all();
            Post::create([
                'title' => $request['title'],
                'content'=> $request['content'],
                'category'=> $request['category'],
                'user_first_name'=> $user->firstName,
                'user_last_name'=> $user->lastName,
            ]);
            $posts = Post::all();
            
            
            return view('post.post_page',compact('posts','filter_type'));
        }
    }

    /**
    *   Function to direct to the create post page
    *   the parameters doesn't matter for now
    */
    public function create_post_page()
    {   
        return view('post.create_post_page');
    }

    /**
    *   Function to direct to the create post page
    *   the parameters doesn't matter for now
    */

    public function sort_objects_by_total($a, $b) {
    if($a->updated_at == $b->updated_at){ return 0 ; }
    return ($a->updated_at < $b->updated_at) ? -1 : 1;
}

    public function check_post_page(Request $request)
    {   
        $posts = Post::all();
        $filter_type = 1;
        $option = $request['filter'];
        if($option == 1){
            //$posts = $posts->sortByDesc('updated_at');
            $posts = $posts->filter(function ($post) {
                return $post->category == "Food";
            });
            $filter_type = 1; 
        }

        if($option == 2){
            
               
             //$posts->contains('category',"Food");
             $posts = $posts->filter(function ($post) {
                return $post->category == "Academic";

            });
            $filter_type = 2;  

        }

        if($option == 3){ // change to aq! 
              $posts = $posts->filter(function ($post) {
                return $post->category == "Q&A";
            });
            $posts = $posts->sortByDesc('updated_at');
            $filter_type = 3; 
        }

        return view('post.post_page',compact('posts', 'filter_type'));
    }

    public function delete_post_page(Request $request)
    {
        DB::table('posts')->where('id', '=', $request['post_id'])->delete();
        $posts = Post::all();
        return view('post.post_page',compact('posts'));
    }

    public function search(Request $request){

        
        #echo $request['content'];
        #echo $request['search_param'];
        $filter_type = 1; 

        if($request['search_param'] == 'all'){
            $posts = DB::table('posts')->where('title', 'like', '%'.$request['content'].'%')->get();
        }

        if($request['search_param'] == 'title'){
            $posts = DB::table('posts')->where('title', 'like', '%'.$request['content'].'%', 'or',
                                               'content', 'like', '%'.$request['content'].'%', 'or',
                                               'user_first_name', 'like', '%'.$request['content'].'%', 'or',
                                               'user_last_name', 'like', '%'.$request['content'].'%')->get();
        }

        if($request['search_param'] == 'content'){
            $posts = DB::table('posts')->where('content', 'like', '%'.$request['content'].'%')->get();
        }

        if($request['search_param'] == 'author'){
            $posts = DB::table('posts')->where('user_first_name', 'like', '%'.$request['content'].'%', 'or', 'user_last_name', 'like', '%'.$request['content'].'%')->get();
        }

        return view('post.post_page',compact('posts','filter_type'));
    }

}
