<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kontak
 * 
 * @property string|null $email
 * @property string|null $name
 * @property string|null $status
 *
 * @package App\Models
 */
class Kontak extends Model
{
	protected $table = 'kontak';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'email',
		'name',
		'status'
	];
}
