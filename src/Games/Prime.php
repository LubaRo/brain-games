<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no';

function primeGameRun()
{
    $getGameData = function () {
        $number = rand(1, 100);
        $correct_answer = isPrime($number) === true ? 'yes' : 'no';

        return array($number, $correct_answer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function isPrime($num)
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
