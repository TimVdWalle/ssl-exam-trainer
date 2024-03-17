<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperQuestion
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'question', 'url'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
