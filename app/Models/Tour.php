<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tour
 * 
 * @property string|null $title
 * @property string|null $img
 * @property string|null $content
 * @property string|null $status
 * @property int|null $hit
 * @property string|null $slug
 * @property string|null $date
 * @property string|null $harga
 * @property string|null $harga_detail
 * @property string|null $pricelist
 * @property string|null $short
 *
 * @package App\Models
 */
class Tour extends Model
{
	protected $table = 'tour';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'hit' => 'int'
	];

	protected $fillable = [
		'title',
		'img',
		'content',
		'status',
		'hit',
		'slug',
		'date',
		'harga',
		'harga_detail',
		'pricelist',
		'short'
	];
}
