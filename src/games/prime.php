<?php

namespace BrainGames\PrimeGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

function prime_game_run()
{
    play_game(
        function () {

            $number = fn_get_random_number();
            $correct_answer = is_prime($number) === true ? 'yes' : 'no';

            return array($number, $correct_answer);
        }
    );
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
