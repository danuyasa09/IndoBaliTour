<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KontakKami
 * 
 * @property string|null $kontak
 * @property string|null $title
 * @property string|null $type
 *
 * @package App\Models
 */
class KontakKami extends Model
{
	protected $table = 'kontak_kami';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'kontak',
		'title',
		'type'
	];
}
