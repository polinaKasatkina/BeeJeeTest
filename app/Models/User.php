<?php

namespace App\Models;

use App\Helpers\Text;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Helpers\Input;
use App\Helpres\Flash;
use App\Helpers\Hash;
use App\Helpers\Config;
use App\Helpers\Session;

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
