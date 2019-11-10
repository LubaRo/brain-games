<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';

function progressionGameRun()
{
    $getGameData = function () {
        $progression_numbers = getProgressionNumbers();
        list($question, $correct_answer) = getQuestionData($progression_numbers);

        return array($question, (string) $correct_answer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getProgressionNumbers($qty = 10)
{
    $progression_numbers = array();
    $progression_step = rand(1, 100);

    for ($i = 0; $i < 10; $i++) {
        if (!isset($progression_numbers[$i - 1])) {
            $progression_numbers[$i] = rand(1, 100) + $progression_step;
        } else {
            $progression_numbers[$i] = $progression_numbers[$i - 1] + $progression_step;
        }
    }

    return $progression_numbers;
}

function getQuestionData($progression_numbers, $replace = '..')
{
    $qty = sizeof($progression_numbers) - 1;
    $hidden_num_postion = rand(1, $qty);

    $answer = $progression_numbers[$hidden_num_postion];
    $progression_numbers[$hidden_num_postion] = $replace;

    $question = implode(' ', $progression_numbers);

    return array($question, $answer);
}
