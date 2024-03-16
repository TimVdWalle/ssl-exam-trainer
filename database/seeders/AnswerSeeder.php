<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/answers.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            foreach ($obj->answers as $ans) {
                Answer::create([
                    'question_id' => $question->id,
                    'option' => $ans->option,
                    'answer' => $ans->answer,
                    'is_correct' => $ans->is_correct,
                ]);
            }
        }
    }
}
