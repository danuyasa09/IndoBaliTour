<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agenda
 * 
 * @property Carbon|null $date
 * @property Carbon|null $end_date
 * @property string|null $time
 * @property string|null $place
 * @property string|null $title
 * @property string|null $content
 * @property int|null $hit
 * @property string|null $status
 * @property string|null $slug
 * @property string|null $img
 *
 * @package App\Models
 */
class Agenda extends Model
{
	protected $table = 'agenda';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'end_date' => 'datetime',
		'hit' => 'int'
	];

	protected $fillable = [
		'date',
		'end_date',
		'time',
		'place',
		'title',
		'content',
		'hit',
		'status',
		'slug',
		'img'
	];
}
