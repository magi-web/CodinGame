<?php

declare(strict_types=1);


namespace App\Easy;


class RugbyScore
{
    const DROP_POINTS = 3;
    const TRY_POINTS = 5;
    const TRANSFORMATION_POINTS = 2;

    public static function getScoreFromCombination(int $try, int $transformation, int $drop): int
    {
        return $try * self::TRY_POINTS + $transformation * self::TRANSFORMATION_POINTS + $drop * self::DROP_POINTS;
    }

    public static function getScoreCombinations(int $score): array
    {
        $scoreCombinations = [];

        $maxDrops = $score / self::DROP_POINTS +1;
        $maxTries = $score / self::TRY_POINTS +1;
        $maxTransformations = $score / (self::TRY_POINTS + self::TRANSFORMATION_POINTS) +1;

        for ($try = 0; $try <= $maxTries; $try++) {
            for ($transformation = 0; $transformation <= $try && $transformation <= $maxTransformations; $transformation++) {
                for ($drop = 0; $drop <= $maxDrops; $drop++) {
                    if (self::getScoreFromCombination($try, $transformation, $drop) === $score) {
                        $scoreCombinations[] = $try . " " . $transformation . " " . $drop;
                    }
                }
            }
        }

        return $scoreCombinations;
    }
}
