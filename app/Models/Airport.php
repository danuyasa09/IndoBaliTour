<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Airport
 * 
 * @property string|null $start
 * @property string|null $destination
 * @property string|null $price
 * @property string|null $status
 *
 * @package App\Models
 */
class Airport extends Model
{
	protected $table = 'airport';
	public $timestamps = false;

	protected $fillable = [
		'start',
		'destination',
		'price',
		'status'
	];
}
