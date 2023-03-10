<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'name','image','description'
    ];



}
