<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use DB;

class UserController extends Controller
{
    //

    /**
    *   Function to login
    */
    public function login(Request $request)
    {   
    	$user = DB::table('Users')->where('email','=',$request['email'])->get();

    	//If the user is not registerd 
    	//echo strlen($user) ;
        if(strlen($user) != 2){
        	
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
        	
        	return view('post.create_post_page');
        }
    }

    /**
    *   Function to login
    */
    public function register(Request $request)
    {   
    	
    	User::create([
	            'email' => $request['email'],
	            'name'=> $request['name'],
                'age' => $request['age'],
                'gender'=> $request['gender'],
                'firstName'=> $request['firstName'],
                'lastName'=> $request['lastName'],
                'password'=>$request['password'],

        ]);

        return view('post.create_post_page');

        	
        
    }
}
