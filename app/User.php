<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
    protected $fillable = [
                          'password',
                           'email',
                           'gender',
                           'level',
                           'age',
                           'firstName',
                           'lastName',
                           ];
}
