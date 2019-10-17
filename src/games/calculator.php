<?php

namespace BrainGames\CalculatorGame;

use function BrainGames\Engine\play_game;

function calculator_game_run()
{
    play_game(
        function () {
            list($num1, $num2, $math_sign) = fn_get_expression_components();
            $expression = "{$num1} {$math_sign} {$num2}";

            $question = "Question: {$expression}";
            $correct_answer = fn_get_correct_answer($expression);

            return array($question, (string) $correct_answer);
        }
    );
}

function fn_get_expression_components()
{
    return array(2, 5, '+');
}

function fn_get_correct_answer($expression)
{
    return eval('return ' . $expression . ';');
}
