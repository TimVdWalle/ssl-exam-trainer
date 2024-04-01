<?php

namespace App\DTOs;

use App\Http\Requests\TestRequest;
use App\Models\Answer;
use Illuminate\Support\Collection;

/**
 *
 */
class MetricsDTO
{
    /**
     * @var int
     */
    public int $passRate;
    /**
     * @var int
     */
    public int $averageScore;
    /**
     * @var array<string, int|string>
     */
    public array $scoresOverTime;
    /**
     * @var int
     */
    public int $totalQuestions;
    /**
     * @var int
     */
    public int $totalAnswers;
    /**
     * @var int
     */
    public int $totalTests;
    /**
     * @var int
     */
    public int $totalTestsPassed;

    /**
     * @param int $passRate
     * @param int $averageScore
     * @param array<string, int|string> $scoresOverTime
     * @param int $totalQuestions
     * @param int $totalAnswers
     * @param int $totalTests
     * @param int $totalTestsPassed
     */
    public function __construct(int $passRate, int $averageScore, array $scoresOverTime, int $totalQuestions, int $totalAnswers, int $totalTests, int $totalTestsPassed)
    {
        $this->passRate = $passRate;
        $this->averageScore = $averageScore;
        $this->scoresOverTime = $scoresOverTime;
        $this->totalQuestions = $totalQuestions;
        $this->totalAnswers = $totalAnswers;
        $this->totalTests = $totalTests;
        $this->totalTestsPassed = $totalTestsPassed;
    }

//    /**
//     * Create a new DTO from an array of attributes.
//     *
//     * @param  array  $attributes
//     * @return self
//     */
//    public static function fromArray(array $attributes): self
//    {
//        return new self(
//            $attributes['passRate'] ?? 0,
//            $attributes['averageScore'] ?? 0,
//            $attributes['scoresOverTime'] ?? [],
//            $attributes['totalQuestions'] ?? 0,
//            $attributes['totalAnswers'] ?? 0
//        );
//    }
}
