<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function evenGamePlay()
{
    $getGameData = function () {
        $randomNum = rand(1, 100);

        $question = "{$randomNum}";
        $correctAnswer = getCorrectAnswer($randomNum);

        return array($question, $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);

    return true;
}

function isEven($number)
{
    return !($number & 1);
}

function getCorrectAnswer($number)
{
    $answer = isEven($number);

    return $answer === true ? 'yes' : 'no';
}
