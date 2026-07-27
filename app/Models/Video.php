<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * 
 * @property Carbon|null $date
 * @property string|null $title
 * @property string|null $content
 * @property string|null $source
 * @property int|null $hit
 * @property string|null $status
 *
 * @package App\Models
 */
class Video extends Model
{
	protected $table = 'video';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'hit' => 'int'
	];

	protected $fillable = [
		'date',
		'title',
		'type',
		'content',
		'source',
		'hit',
		'status'
	];
}
