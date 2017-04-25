<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//Import Post model to the controller
use App\Post;
use App\Reply;
use App\User;
use DB;

class ReplyController extends Controller
{
    /**
    *   Function to create a post 
    *   the parameters doesn't matter for now
    */
    public function reply_post(Request $request)
    {   

        $replys = Reply::all();
        
        Reply::create([
            'Post_id' => $request['post_id'],
            'replyPost_id' => rand(),
            'content'=> $request['content'],
        ]);
        $replys = Reply::all();
        $filter_type = 1; 
        $sort_type = 1; 
        $posts = Post::all();
        
        return view('post.post_page',compact('replys','filter_type','sort_type','posts'));
    }

    /**
    *   Function to direct to the create post page
    *   the parameters doesn't matter for now
    */
    public function create_reply_page(Request $request)
    {   
        $post_id = $request['reply_id'];

        return view('reply.create_reply_page', compact('post_id'));
    }

}
