<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUserAssign extends Model
{
    protected $guarded = [];


    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
