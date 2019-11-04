<?php

namespace BrainGames\GcdGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

function gcd_game_run()
{
    $game_rules = "Find the greatest common divisor of given numbers.\n";
    $fn_ask_question = function () {
        $num1 = fn_get_random_number(1, 100);
        $num2 = fn_get_random_number(1, 100);

        $question = "{$num1} {$num2}";
        $correct_answer = fn_get_gsd($num1, $num2);

        return array($question, (string) $correct_answer);
    };

    play_game($game_rules, $fn_ask_question);
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
