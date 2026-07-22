<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Album
 * 
 * @property int $id_album
 * @property string|null $title
 * @property string|null $img
 * @property int|null $hit
 * @property string|null $slug
 * @property Carbon|null $date
 * @property string|null $status
 * 
 * @property Collection|Foto[] $fotos
 *
 * @package App\Models
 */
class Album extends Model
{
	protected $table = 'album';
	protected $primaryKey = 'id_album';
	public $timestamps = false;

	protected $casts = [
		'hit' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'title',
		'img',
		'hit',
		'slug',
		'date',
		'status'
	];

	public function fotos()
	{
		return $this->hasMany(Foto::class, 'id_album');
	}
}
