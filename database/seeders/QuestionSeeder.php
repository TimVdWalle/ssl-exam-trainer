<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/questions.json");
        $data = json_decode($json);

        // Load the correct answers JSON
        $correctAnswersJson = File::get("database/data/answers.json");
        $correctAnswers = json_decode($correctAnswersJson, true);

        foreach ($data as $obj) {
//            dd($obj);

            $question = Question::create([
                'number' => $obj->question_number,
                'question' => $obj->question,
                'url' => $obj->url ?? null,
            ]);

            // Assuming $obj->answers is an array of answer options (A, B, C, etc.)
            foreach ($obj->options as $option => $answerText) {
                Answer::create([
                    'question_id' => $question->id,
                    'option' => $option,
                    'answer' => $answerText,
                    // Set is_correct based on whether this option matches the correct answer in $correctAnswers
                    'is_correct' => $correctAnswers[$obj->question_number] == $option,
                ]);
            }
        }
    }
}
