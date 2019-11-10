<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';

function progressionGameRun()
{
    $getGameData = function () {
        $progressionNumbers = getProgressionNumbers();
        list($question, $correctAnswer) = getQuestionData($progressionNumbers);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getProgressionNumbers($qty = 10)
{
    $progressionNumbers = array();
    $progressionStep = rand(1, 100);

    for ($i = 0; $i < 10; $i++) {
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
    $hiddenNumPostion = rand(1, $qty);

    $answer = $progressionNumbers[$hiddenNumPostion];
    $progressionNumbers[$hiddenNumPostion] = $replace;

    $question = implode(' ', $progressionNumbers);

    return array($question, $answer);
}
