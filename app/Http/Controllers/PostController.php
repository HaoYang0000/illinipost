<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//Import Post model to the controller
use App\Post;
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
        	//Link user with posts
        	/*
        	Post::create([
	            'user_id' => $request['NUID'],
	            'title' => $request['title'],
	            'content'=> $request['content'],
        	]);
        	return view('welcome');
        	*/
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
    public function check_post_page()
    {   
        $posts = Post::all();
        return view('post.post_page',compact('posts'));
    }

    public function delete_post_page(Request $request)
    {
        DB::table('Posts')->where('post_id', '=', $request['post_id'])->delete();
        $posts = Post::all();
        return view('post.post_page',compact('posts'));
    }

}
