<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;

function progressionGameRun()
{
    $getGameData = function () {
        $progression = getProgression(PROGRESSION_SIZE, rand(1, 100), rand(1, 100));
        list($question, $correctAnswer) = getQuestionData($progression);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getProgression($size, $startFrom, $step)
{
    $progression = array();

    for ($i = 0; $i < $size; $i++) {
        if (empty($progression)) {
            $progression[$i] = $startFrom;
        } else {
            $progression[$i] = $progression[$i - 1] + $step;
        }
    }

    return $progression;
}

function getQuestionData($progression, $replacement = '..')
{
    $qty = sizeof($progression) - 1;
    $hiddenPostionIndex = rand(1, $qty);

    $answer = $progression[$hiddenPostionIndex];
    $progression[$hiddenPostionIndex] = $replacement;

    $question = implode(' ', $progression);

    return array($question, $answer);
}
