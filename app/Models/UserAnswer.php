<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperUserAnswer
 */
class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'user_id',
        'question_id',
        'answer_id',
        'is_correct',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Test, UserAnswer>
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * The question that the answer belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Question, UserAnswer>
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * The answer chosen for the question, if any.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Answer, UserAnswer>
     */
    public function answer()
    {
        // Since 'answer_id' can be nullable, indicating that a user may not have provided an answer,
        // the relationship should gracefully handle the "null" case.
        return $this->belongsTo(Answer::class)->withDefault();
    }
}
