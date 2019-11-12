<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function evenGamePlay()
{
    $getGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return array($question, $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);

    return true;
}

function isEven($number)
{
    return !($number & 1);
}
