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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Answer>
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    /**
     * Get the correct answer for the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Answer>
     */
    public function correctAnswer()
    {
        return $this->hasOne(Answer::class)->where('is_correct', true);
    }
}
