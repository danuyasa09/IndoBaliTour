<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * 
 * @property string|null $nama
 * @property string|null $bahasa
 * @property string|null $posisi
 * @property string|null $asal
 * @property string|null $profile
 * @property string|null $img
 * @property string|null $status
 * @property string|null $slug
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'team';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nama',
		'bahasa',
		'posisi',
		'asal',
		'profile',
		'img',
		'status',
		'slug'
	];
}
