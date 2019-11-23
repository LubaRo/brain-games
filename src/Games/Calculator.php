<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\playGame;

define('MATH_SIGNS', array('+', '-', '*'));

const DESCRIPTION = 'What is the result of the expression?';

function runCalculatorGame()
{
    $getGameData = function () {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        $mathSign = MATH_SIGNS[array_rand(MATH_SIGNS)];
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
