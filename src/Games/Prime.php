<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no';

function primeGameRun()
{
    $getGameData = function () {
        $number = rand(1, 100);
        $correctAnswer = isPrime($number) === true ? 'yes' : 'no';

        return array($number, $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i < intval($num / 2); $i = $i + 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}