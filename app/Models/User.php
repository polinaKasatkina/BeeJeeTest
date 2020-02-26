<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends Eloquent
{

    protected $fillable = [
        'name', 'email', 'password'
    ];

}
