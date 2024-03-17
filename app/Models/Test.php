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
        'user_id', // Assuming you track which user the session belongs to
        'score',   // Assuming you store a score or outcome of the session
        'passed',  // Whether or not the user passed the session
        // Any other fields relevant to the session
    ];

    // Define relationships here, for example:
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'test_id');
    }
}
