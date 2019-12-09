<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    public function home_team()
    {
        return $this->belongsTo(Team::class, 'home', 'id');
    }

    public function away_team()
    {
        return $this->belongsTo(Team::class, 'away', 'id');
    }

}