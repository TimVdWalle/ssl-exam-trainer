<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAnswer
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option', 'answer', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
