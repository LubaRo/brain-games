<?php

namespace BrainGames\CalculatorGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

define('MATH_SIGNS', array('+', '-', '*'));
define('DEFAULT_SIGN', '+');

function calculator_game_run()
{
    $game_rule = "What is the result of the expression?\n";
    $fn_ask_question = function () {
        list($num1, $num2, $math_sign) = fn_get_expression_components();
        $question = "{$num1} {$math_sign} {$num2}";
        $correct_answer = fn_get_correct_answer($num1, $num2, $math_sign);

        return array($question, (string) $correct_answer);
    };

    play_game($game_rule, $fn_ask_question);
}

function fn_get_expression_components()
{
    $num1 = fn_get_random_number(1, 10);
    $num2 = fn_get_random_number(1, 10);

    $sign_key = fn_get_random_number(1, 3);
    $math_sign = isset(MATH_SIGNS[$sign_key]) ? MATH_SIGNS[$sign_key] : DEFAULT_SIGN;
    return array($num1, $num2, $math_sign);
}

function fn_get_correct_answer($num1, $num2, $math_sign)
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
