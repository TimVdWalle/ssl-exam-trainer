<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTest
 */
class Test extends Model
{
    use HasFactory;

     protected $fillable = [
        'hash', // Assuming you track which user the session belongs to
        'score',   // Assuming you store a score or outcome of the session
        'score_percentage',   // Assuming you store a score or outcome of the session
        'number_of_questions',
        'passed',  // Whether or not the user passed the session
        'user_id', // Assuming you track which user the session belongs to
         'created_at',
         'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    // Define relationships here, for example:

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Test>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<UserAnswer>
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'test_id');
    }
}
