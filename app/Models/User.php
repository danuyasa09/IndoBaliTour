<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;

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
class User extends Authenticatable implements FilamentUser, HasName
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

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->level === 'admin' || $this->level === 'superadmin';
    }

    public function getFilamentName(): string
    {
        return $this->nama ?? $this->username;
    }
}
