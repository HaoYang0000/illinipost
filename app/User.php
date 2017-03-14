<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    use AuthenticableTrait;

    protected $table = 'users';

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
