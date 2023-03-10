<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = [
        'title',
        'mainurl',
        'email',
        'address',
        'logo',
        'profile_picture',
        'description',
        'seo_desc',
        'phone',
        'mobilephone',
        'instagram',
        'facebook',
        'lat',
        'lng'

    ];

    protected $table = 'settings';
}
