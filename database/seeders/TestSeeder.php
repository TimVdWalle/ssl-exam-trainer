<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a user to assign these tests to
        $user = User::find(2); // Get the first user

        $startDate = Carbon::now()->subMonths(6);
        $endDate = Carbon::now();

        $currentDate = $startDate;
        $progressIncrement = 5; // Increment of score_percentage per test
        $currentProgress = 5; // Starting score_percentage

        while ($currentDate->lte($endDate)) {
            // Create a new test for the user
            $test = Test::create([
                'user_id' => $user->id,
                'hash' => md5(uniqid(rand(), true)),
                'score_percentage' => $currentProgress,
                'passed' => $currentProgress >= 50 ? true : false,
                'number_of_questions' => 5, // Assuming each test has 10 questions
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
                'updated_at' => $currentDate->format('Y-m-d H:i:s'),
            ]);

            // Generate answers for the test
            $questions = Question::inRandomOrder()->take(10)->get();
            foreach ($questions as $question) {
                $correctAnswer = $question->answers()->where('is_correct', true)->first();
                UserAnswer::create([
                    'test_id' => $test->id,
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'answer_id' => $correctAnswer->id, // Assuming the user always selects the correct answer for simplicity
                    'is_correct' => random_int(0,5),
                    'created_at' => $currentDate->format('Y-m-d H:i:s'),
                    'updated_at' => $currentDate->format('Y-m-d H:i:s'),
                ]);
            }

            // Increment progress and current date
            $currentProgress = min(40, $currentProgress + $progressIncrement);
            $currentDate = $currentDate->addWeeks(1); // Move to the next test date by 1 week
        }
    }
}
