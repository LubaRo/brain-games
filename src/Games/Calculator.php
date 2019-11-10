<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\playGame;

define('MATH_SIGNS', array('+', '-', '*'));
define('DEFAULT_SIGN', '+');

const DESCRIPTION = 'What is the result of the expression?';

function calculatorGameRun()
{
    $getGameData = function () {
        list($num1, $num2, $math_sign) = getExpressionComponents();
        $question = "{$num1} {$math_sign} {$num2}";
        $correct_answer = getCorrectAnswer($num1, $num2, $math_sign);

        return array($question, (string) $correct_answer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getExpressionComponents()
{
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);

    $sign_key = rand(1, 3);
    $math_sign = isset(MATH_SIGNS[$sign_key]) ? MATH_SIGNS[$sign_key] : DEFAULT_SIGN;

    return array($num1, $num2, $math_sign);
}

function getCorrectAnswer($num1, $num2, $math_sign)
{
    switch ($math_sign) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}
