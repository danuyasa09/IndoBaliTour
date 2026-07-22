<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Funactivity
 * 
 * @property string|null $title
 * @property string|null $content
 * @property int|null $hit
 * @property string|null $status
 * @property string|null $pricelist
 * @property string|null $price
 * @property string|null $description
 * @property string|null $slug
 * @property string|null $img
 *
 * @package App\Models
 */
class Funactivity extends Model
{
	protected $table = 'funactivity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'hit' => 'int'
	];

	protected $fillable = [
		'title',
		'content',
		'hit',
		'status',
		'pricelist',
		'price',
		'description',
		'slug',
		'img'
	];
}
