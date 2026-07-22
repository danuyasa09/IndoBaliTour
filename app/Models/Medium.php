<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medium
 * 
 * @property string|null $title
 * @property string|null $url
 *
 * @package App\Models
 */
class Medium extends Model
{
	protected $table = 'media';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title',
		'url'
	];
}
