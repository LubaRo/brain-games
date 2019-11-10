<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\play_game;

function prime_game_run()
{
    $game_rules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";
    $fn_ask_question = function () {
        $number = rand(1, 100);
        $correct_answer = is_prime($number) === true ? 'yes' : 'no';

        return array($number, $correct_answer);
    };

    play_game($game_rules, $fn_ask_question);
}

function is_prime($num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = intval($num / 2); $i > 1; $i = $i - 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
