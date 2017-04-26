<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;


class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'id',
                           'user_id',
                           'user_first_name',
                           'user_last_name',
                           'title',
                           'content',
                           'category',
                           ];
    

    public function getOwner($post)
    {
        //dd($id->id);
        $reply = Reply::where('Post_id', '=', $post->id)->get();
        //dd($reply);
        return $reply;
    }

}
