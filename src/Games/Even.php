<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function runEvenGame()
{
    $getGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return array($question, $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function isEven($number)
{
    return !($number & 1);
}
