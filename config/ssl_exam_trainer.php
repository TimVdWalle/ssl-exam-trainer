<?php

return [
    'test_hash_length' => env('HASH_LENGTH', 6),

    'questions_per_test' => env('QUESTIONS_PER_TEST', 15),
    'min_correct_to_pass' => env('MIN_CORRECT_TO_PASS', 9),
    'max_wrong_percentage' => 40,
];
