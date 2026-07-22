<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriTour
 * 
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $img
 *
 * @package App\Models
 */
class KategoriTour extends Model
{
	protected $table = 'kategori_tour';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'title',
		'slug',
		'img'
	];
}
