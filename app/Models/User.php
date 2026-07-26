<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property string|null $username
 * @property string|null $password
 * @property string|null $nama
 * @property string|null $level
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	public $incrementing = true;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'nama',
		'level'
	];


    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
