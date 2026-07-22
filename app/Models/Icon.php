<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Icon
 * 
 * @property string|null $title
 * @property string|null $img
 * @property string|null $url
 * @property string|null $status
 *
 * @package App\Models
 */
class Icon extends Model
{
	protected $table = 'icon';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title',
		'img',
		'url',
		'status'
	];
}
