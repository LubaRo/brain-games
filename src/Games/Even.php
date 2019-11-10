<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function evenGamePlay()
{
    $getGameData = function () {
        $random_num = rand(1, 100);

        $question = "{$random_num}";
        $correct_answer = getCorrectAnswer($random_num);

        return array($question, $correct_answer);
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
