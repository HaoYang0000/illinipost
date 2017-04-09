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
    	//If the user is not registerd 
        if($user == NULL){
            $posts = Post::all();
            Post::create([
	            'title' => $request['title'],
	            'content'=> $request['content'],
                'category'=> $request['category'],
        	]);
        	$posts = Post::all();
            
        	return view('post.post_page',compact('posts'));

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
            
            return view('post.post_page',compact('posts'));
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
        $option = $request['filter'];
        if($option == 1){
            //$posts = $posts->sortByDesc('updated_at');
            $posts = $posts->filter(function ($post) {
                return $post->category == "Food";
            });
        }

        if($option == 2){
            
               
             //$posts->contains('category',"Food");
             $posts = $posts->filter(function ($post) {
                return $post->category == "Academic";
            });

                //$posts->all();

            
        }

        if($option == 3){
            $posts = $posts->sortByDesc('updated_at');
        }
        return view('post.post_page',compact('posts'));
    }

    public function delete_post_page(Request $request)
    {
        DB::table('posts')->where('id', '=', $request['post_id'])->delete();
        $posts = Post::all();
        return view('post.post_page',compact('posts'));
    }

    public function search(Request $request){
        
        $posts = DB::table('posts')->where('title', 'like', '%'.$request['content'].'%')->get();
        return view('post.post_page',compact('posts'));
    }

}
