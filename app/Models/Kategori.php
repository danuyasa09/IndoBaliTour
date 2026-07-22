<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kategori
 * 
 * @property string|null $title
 * @property string|null $slug
 *
 * @package App\Models
 */
class Kategori extends Model
{
	protected $table = 'kategori';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title',
		'slug'
	];
}
