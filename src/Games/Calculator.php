<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\playGame;

define('MATH_SIGNS', array('+', '-', '*'));
define('DEFAULT_SIGN', '+');

const DESCRIPTION = 'What is the result of the expression?';

function calculatorGameRun()
{
    $getGameData = function () {
        list($num1, $num2, $mathSign) = getExpressionComponents();
        $question = "{$num1} {$mathSign} {$num2}";
        $correctAnswer = getCorrectAnswer($num1, $num2, $mathSign);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getExpressionComponents()
{
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);

    $signKey = rand(1, 3);
    $mathSign = isset(MATH_SIGNS[$signKey]) ? MATH_SIGNS[$signKey] : DEFAULT_SIGN;

    return array($num1, $num2, $mathSign);
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
