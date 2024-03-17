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
        'question_id',
        'answer_id',
        'is_correct',
    ];
}
