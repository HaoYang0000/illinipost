<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'replys';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'Post_id',
                           'replyPost_id',
                           'content'
                           ];
}
