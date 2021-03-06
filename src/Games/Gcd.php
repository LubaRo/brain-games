<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function runGcdGame()
{
    $getGameData = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $question = "$num1 $num2";
        $correctAnswer = getGcd($num1, $num2);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getGcd($num1, $num2)
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
