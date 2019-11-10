<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\play_game;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd_game_run()
{
    $fn_ask_question = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $question = "{$num1} {$num2}";
        $correct_answer = fn_get_gsd($num1, $num2);

        return array($question, (string) $correct_answer);
    };

    play_game(DESCRIPTION, $fn_ask_question);
}

function fn_get_gsd($num1, $num2)
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
