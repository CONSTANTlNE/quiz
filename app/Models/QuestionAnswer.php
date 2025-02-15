<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $guarded = [];

    public function testQuestion()

    {
        return $this->belongsTo(TestQuestion::class);
    }
}
