<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelTransfer
 * 
 * @property string|null $start
 * @property string|null $destination
 * @property int|null $price
 * @property string|null $status
 *
 * @package App\Models
 */
class HotelTransfer extends Model
{
	protected $table = 'hotel_transfer';
	public $timestamps = false;

	protected $casts = [
		'price' => 'int'
	];

	protected $fillable = [
		'start',
		'destination',
		'price',
		'status'
	];
}
