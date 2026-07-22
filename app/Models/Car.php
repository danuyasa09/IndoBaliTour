<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property string|null $title
 * @property string|null $img
 * @property string|null $content
 * @property string|null $status
 * @property string|null $slug
 *
 * @package App\Models
 */
class Car extends Model
{
	protected $table = 'car';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title',
		'img',
		'content',
		'status',
		'slug'
	];
}
