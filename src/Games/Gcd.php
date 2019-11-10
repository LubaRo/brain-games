<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcdGameRun()
{
    $getGameData = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $question = "{$num1} {$num2}";
        $correctAnswer = getGsd($num1, $num2);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getGsd($num1, $num2)
{
    while ($num1 != 0 && $num2 != 0) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }

    return $num1 + $num2;
}
