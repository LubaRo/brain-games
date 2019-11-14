<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\playGame;

define('MATH_SIGNS', array('+', '-', '*'));

const DESCRIPTION = 'What is the result of the expression?';

function calculatorGameRun()
{
    $getGameData = function () {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        $signKey = rand(0, sizeof(MATH_SIGNS) - 1);
        $mathSign = MATH_SIGNS[$signKey];

        $question = "$num1 $mathSign $num2";
        $correctAnswer = getCorrectAnswer($num1, $num2, $mathSign);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getCorrectAnswer($num1, $num2, $mathSign)
{
    switch ($mathSign) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}
