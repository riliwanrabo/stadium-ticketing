<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id', 'id');
    }

    public function fixture()
    {
        return $this->belongsTo(Fixture::class, 'fixture_id');
    }
}