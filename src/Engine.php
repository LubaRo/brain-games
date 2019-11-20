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

    for ($i = 0; $i < ATTEMPTS_QTY; $i += 1) {
        list($question, $correctAnswer) = $getGameData();

        $userAnswer = prompt("Question: " . $question);
        line("Your answer: %s\n", $userAnswer);

        if ($correctAnswer === $userAnswer) {
            line("Correct!\n");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);

            exit();
        }
    }

    line("Congratulations, %s!", $userName);
}
