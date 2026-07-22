<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Beritum
 * 
 * @property Carbon|null $date
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $img
 * @property string|null $caption
 * @property string|null $content
 * @property string|null $status
 * @property int|null $hit
 * @property string|null $tags
 * @property string|null $keyword
 * @property string|null $id_category
 *
 * @package App\Models
 */
class Beritum extends Model
{
	protected $table = 'berita';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'hit' => 'int'
	];

	protected $fillable = [
		'date',
		'title',
		'slug',
		'img',
		'caption',
		'content',
		'status',
		'hit',
		'tags',
		'keyword',
		'id_category'
	];
}
