<?php

return [
    'questions_per_test' => env('QUESTIONS_PER_TEST', 15),
    'min_correct_to_pass' => env('MIN_CORRECT_TO_PASS', 9),
    'test_hash_length' => env('TEST_HASH_LENGTH', 6),
];
