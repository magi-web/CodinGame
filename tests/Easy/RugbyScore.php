<?php

declare(strict_types=1);


namespace App\Tests\Easy;

use PHPUnit\Framework\TestCase;

class RugbyScore extends TestCase
{
    /**
     * @dataProvider scoresAndCominations
     */
    public function testScoreCombination(int $score, array $expectedCombinations)
    {
        $this->assertSame($expectedCombinations, \App\Easy\RugbyScore::getScoreCombinations($score));
    }

    /**
     * @dataProvider scoresData
     */
    public function testScoreCalculus(int $tries, int $transformations, int $drops, int $expectedScore)
    {
        $this->assertSame($expectedScore, \App\Easy\RugbyScore::getScoreFromCombination($tries, $transformations, $drops));
    }

    public function scoresData(): array
    {
        return [
            [2, 1, 0, 12],
            [0, 0, 4, 12],
            [0, 0, 5, 15],
        ];
    }

    public function scoresAndCominations(): array
    {
        return [
            [12, ["0 0 4", "2 1 0",]],
            [15, ["0 0 5", "2 1 1", "3 0 0",]],
            [21, ["0 0 7", "2 1 3", "3 0 2", "3 3 0",]],
            [88, ["1 1 27", "2 0 26", "3 2 23", "4 1 22", "4 4 20", "5 0 21", "5 3 19", "6 2 18", "6 5 16", "7 1 17", "7 4 15", "7 7 13", "8 0 16", "8 3 14", "8 6 12", "9 2 13", "9 5 11", "9 8 9", "10 1 12", "10 4 10", "10 7 8", "10 10 6", "11 0 11", "11 3 9", "11 6 7", "11 9 5", "12 2 8", "12 5 6", "12 8 4", "12 11 2", "13 1 7", "13 4 5", "13 7 3", "13 10 1", "14 0 6", "14 3 4", "14 6 2", "14 9 0", "15 2 3", "15 5 1", "16 1 2", "16 4 0", "17 0 1",]],
        ];
    }
}
