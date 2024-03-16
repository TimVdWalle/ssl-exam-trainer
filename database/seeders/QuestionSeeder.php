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

        foreach ($data as $obj) {
//            dd($obj->question_number);

            $question = Question::create([
                'number' => $obj->question_number,
                'question' => $obj->question,
                'url' => $obj->url ?? null,
            ]);

            foreach ($obj->options as $option => $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'option' => $option,
                    'answer' => $answer,
                    'is_correct' => false,
                ]);
            }
        }
    }
}
