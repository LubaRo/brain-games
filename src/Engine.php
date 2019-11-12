<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greet;

define('ATTEMPTS_QTY', 3);

function playGame(string $description, callable $getGameData)
{
    line("\nWelcome to the Brain Games!");
    line($description);
    line();

    $userName = prompt('May I have your name?');

    line("Hello, %s!\n", $userName);

    for ($i = 0; $i < ATTEMPTS_QTY; $i = $i + 1) {
        list($question, $correctAnswer) = $getGameData();

        $userAnswer = prompt("Question: " . $question);
        line("Your answer: %s\n", $userAnswer);

        $isCorrect = $correctAnswer === $userAnswer ? true : false;

        if ($isCorrect === true) {
            line("Correct!\n");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\n\n" .
                "Let's try again, %s!", $userAnswer, $correctAnswer, $userName);

            return false;
        }
    }

    line("Congratulations, %s!", $userName);
}
