<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TourFoto
 * 
 * @property string|null $category
 * @property int|null $id_tour
 * @property string|null $img
 *
 * @package App\Models
 */
class TourFoto extends Model
{
	protected $table = 'tour_foto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tour' => 'int'
	];

	protected $fillable = [
		'category',
		'id_tour',
		'img'
	];
}
