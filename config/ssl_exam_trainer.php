<?php

return [
    'test_hash_length' => env('HASH_LENGTH', 6),

    'total_questions_count' => env('TOTAL_QUESTIONS_COUNT', 196),
    'questions_per_test' => env('QUESTIONS_PER_TEST', 15),
    'min_correct_to_pass' => env('MIN_CORRECT_TO_PASS', 9),
    'max_wrong_percentage' => 40,
    'max_wrong_percentage_when_all_questions_answered' => 80,
    'correct_wrong_ratio' => 5,            // a wrong question needs to be answered correctly 5 times for each wrong answer before dissapearing from the wrong list selection
];
