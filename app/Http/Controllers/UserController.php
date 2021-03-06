<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Mail\Welcome;
use App\Image;
use Auth;
use DB;
use Input;

class UserController extends Controller
{
    //

    /**
    *   Function to login
    */
    public function login(Request $request)
    {   
    	  $user = DB::table('users')->where('email','=',$request['email'])->get();

        // create our user data for the authentication
        $userdata = array(
            'email'     => $request['email'],
            'password'  => $request['password']
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            echo 'SUCCESS!';

        } else {        

            // validation not successful, send back to form 
            echo 'FAILED!';

        }

    	// //If the user is not registerd 
    	// //echo strlen($user) ;
     //    if(strlen($user) != 2){
        	
     //    	$posts = Post::all();
     //    	return view('post.post_page',compact('posts'));

     //    }
     //    //If the user is registerd 
     //    else{
     //    	//Link user with posts
     //    	/*
     //    	Post::create([
	    //         'user_id' => $request['NUID'],
	    //         'title' => $request['title'],
	    //         'content'=> $request['content'],
     //    	]);
     //    	return view('welcome');
     //    	*/
        	
     //    	return view('post.create_post_page');
     //    }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Function to login
    */
  
    

    public function register(Request $request)
    {   
    	
    	User::create([
	            'email' => $request['email'],
	            //'name'=> $request['name'],
                'age' => $request['age'],
                'gender'=> $request['gender'],
                'firstName'=> $request['firstName'],
                'lastName'=> $request['lastName'],
                'password'=>$request['password'],

        ]);
      //\Mail::to($user->email)->send(new Welcome);
      
      //echo 'SUCCESS!';

      
        
    }
    public function get_user_info(Request $request)
    {   
        
        $user = $request->user();
        $path = Image::where('user_id','=',$user->id)->first();
        
        if($path != null){
          $path = $path->url;
        }else{
          if($user->gender == 'Male'){
            $path = '/files/male.png';
          }else{
            $path = '/files/female.png';
          }
        }
        return view('user.editUserInfo',compact('user','path'));   
        
    }

    public function update_user_info(Request $request)
    {   
        
        $user = $request->user();
        DB::table('users')->where('id', $user->id)
        ->update(['firstName' => $request['firstName'],
                  'lastName' => $request['lastName'],
                  'email' => $request['email'],
                  'age' => $request['age'],
            ]);


        return redirect('editUserInfo');  
        
    }

    public function update_profile_picture(Request $request)
    {
        //Find ths user first
        $user = $request->user();

        //Set the uploaded file
        $file = $request->file('image');

        $temp = Image::where('user_id','=',$user->id)->first();
        if($temp == null){
            //Set file name with current time
            $filename = date('Y-m-d-H:i:s')."-".$file->getClientOriginalName();
            //Set directory to store file
            $destinationPath = "../public/files/user".$user->id.$user->first_name."/images/"; // upload path
            $request->file('image')->move($destinationPath, $filename); // uploading file to given path
            $destinationPath = "/files/user".$user->id.$user->first_name."/images/".$filename;
            Image::create([
              'user_id'=>$user->id,
              'url'=>$destinationPath,
              'type'=>'Profile'
            ]);
            // Session::flash('success', 'Upload successfully');
            $path = $destinationPath;
            return redirect('editUserInfo');
        }
        else{
            //Set file name with current time
            $filename = date('Y-m-d-H:i:s')."-".$file->getClientOriginalName();
            //Set directory to store file
            $destinationPath = "../public/files/user".$user->id.$user->first_name."/images/"; // upload path
            $request->file('image')->move($destinationPath, $filename); // uploading file to given path
            $destinationPath = "/files/user".$user->id.$user->first_name."/images/".$filename;
            $temp->url = $destinationPath;
            $temp->save();
            // Session::flash('success', 'Upload successfully');
            $path = $destinationPath;
            return redirect('editUserInfo');
        }
    }
}
