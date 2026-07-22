<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * 
 * @property string|null $nama
 * @property string|null $wa
 * @property string|null $email
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $youtube
 * @property string|null $situs
 * @property string|null $linkedin
 * @property string|null $alamat
 * @property string|null $pendidikan
 * @property string|null $keahlian
 * @property string|null $penunjang
 * @property string|null $pengalaman
 * @property string|null $jabatan
 * @property string|null $profil
 * @property string|null $foto
 * @property string|null $cv
 * @property string|null $status
 * @property string|null $slug
 *
 * @package App\Models
 */
class Member extends Model
{
	protected $table = 'member';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nama',
		'wa',
		'email',
		'instagram',
		'twitter',
		'facebook',
		'youtube',
		'situs',
		'linkedin',
		'alamat',
		'pendidikan',
		'keahlian',
		'penunjang',
		'pengalaman',
		'jabatan',
		'profil',
		'foto',
		'cv',
		'status',
		'slug'
	];
}
