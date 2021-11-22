<?php

namespace App\Tests\Easy;

use App\Easy\TextFormatting;
use PHPUnit\Framework\TestCase;

class TextFormattingTest extends TestCase
{

    /**
     * @dataProvider stringsToFormat
     */
    public function testFormat(string $intext, string $expectedResult)
    {
        $this->assertEquals($expectedResult, TextFormatting::format($intext));
    }

    public function stringsToFormat(): array
    {
        return [
            ["one,two,three.", "One, two, three."],
            ["one,two,three.four,five, six.", "One, two, three. Four, five, six."],
            ["one , two , three . four , five , six .", "One, two, three. Four, five, six."],
            ["one , TWO  ,,  three  ..  four,fivE , six .", "One, two, three. Four, five, six."],
            ["when a father gives to his son,,, Both laugh; When a son gives to his father, , , Both cry...shakespeare", "When a father gives to his son, both laugh; when a son gives to his father, both cry. Shakespeare"],
        ];
    }
}
