<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Foto
 * 
 * @property int $id_foto
 * @property int|null $id_album
 * @property string|null $img
 * 
 * @property Album|null $album
 *
 * @package App\Models
 */
class Foto extends Model
{
	protected $table = 'foto';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'id_album' => 'int'
	];

	protected $fillable = [
		'id_album',
		'img'
	];

	public function album()
	{
		return $this->belongsTo(Album::class, 'id_album');
	}
}
