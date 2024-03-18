<?php

namespace App\DTOs;

use App\Http\Requests\TestRequest;
use App\Models\Answer;
use Illuminate\Support\Collection;

class SubmittedTestDTO
{
    /**
     * @var Collection<int, int>
     */
    public Collection $answers;

    /**
     * @param array<int, int> $answers
     */
    public function __construct(array $answers)
    {
        $this->answers = collect($answers);
    }

    /**
     * @param TestRequest $request
     * @return self
     */
    public static function fromRequest(TestRequest $request)
    {
        /** @var array<int, int> $data */
        $data = $request->input('answers', []);

        return new self(
            $data
        );
    }
}
