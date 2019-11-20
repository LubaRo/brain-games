<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;
const REPLACEMENT = '..';

function progressionGameRun()
{
    $getGameData = function () {
        $progression = getProgression(PROGRESSION_SIZE, rand(1, 100), rand(1, 100));
        $hiddenPostionIndex = rand(0, PROGRESSION_SIZE - 1);

        $correctAnswer = $progression[$hiddenPostionIndex];
        $progression[$hiddenPostionIndex] = REPLACEMENT;

        $question = implode(' ', $progression);

        return array($question, (string) $correctAnswer);
    };

    playGame(DESCRIPTION, $getGameData);
}

function getProgression($size, $startFrom, $step)
{
    $progression = array();

    for ($i = 0; $i <= $size; $i++) {
        $progression[$i] = $startFrom + $step * $i;
    }

    return $progression;
}
