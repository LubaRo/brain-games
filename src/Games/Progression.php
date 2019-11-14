<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;

function progressionGameRun()
{
    $getGameData = function () {
        $progressionNumbers = getProgression(PROGRESSION_SIZE);
        list($question, $correctAnswer) = getQuestionData($progressionNumbers);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getProgression($size)
{
    $progressionNumbers = array();
    $progressionStep = rand(1, 100);

    for ($i = 0; $i < $size; $i++) {
        if (!isset($progressionNumbers[$i - 1])) {
            $progressionNumbers[$i] = rand(1, 100) + $progressionStep;
        } else {
            $progressionNumbers[$i] = $progressionNumbers[$i - 1] + $progressionStep;
        }
    }

    return $progressionNumbers;
}

function getQuestionData($progressionNumbers, $replace = '..')
{
    $qty = sizeof($progressionNumbers) - 1;
    $hiddenPostion = rand(1, $qty);

    $answer = $progressionNumbers[$hiddenPostion];
    $progressionNumbers[$hiddenPostion] = $replace;

    $question = implode(' ', $progressionNumbers);

    return array($question, $answer);
}
