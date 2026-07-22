<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pengaturan
 * 
 * @property string|null $company
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $fax
 * @property string|null $email
 * @property string|null $website
 * @property string|null $map
 * @property string|null $script
 * @property string|null $intro
 * @property string|null $cek
 * @property string|null $url_popup
 * @property string|null $header
 * @property string|null $favicon
 * @property string|null $popup
 * @property string|null $background
 * @property string|null $copyright
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keyword
 * @property string|null $seo
 * @property string|null $backgorund_intro
 * @property string|null $logo
 * @property string|null $catalog
 * @property string|null $member
 *
 * @package App\Models
 */
class Pengaturan extends Model
{
	protected $table = 'pengaturan';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'company',
		'address',
		'phone',
		'fax',
		'email',
		'website',
		'map',
		'script',
		'intro',
		'cek',
		'url_popup',
		'header',
		'favicon',
		'popup',
		'background',
		'copyright',
		'meta_title',
		'meta_description',
		'meta_keyword',
		'seo',
		'backgorund_intro',
		'logo',
		'catalog',
		'member'
	];
}
