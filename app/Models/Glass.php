<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Glass extends Model
{
    protected $table = 'glass';

    protected $fillable = [
        'name','image','description'
    ];

    public function getVenue()
    {
        return $this->belongsTo('App\Models\Venue', 'venue_id', 'id');
    }

    public function venues()
    {
        return $this->belongsTo('App\Models\Venue', 'venue_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


}
