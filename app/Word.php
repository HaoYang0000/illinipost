<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    protected $table = 'Words';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'id',
                           'word',
                           'num'
                           ];
}
