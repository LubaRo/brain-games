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

    $correct_answers = 0;
    $user_name = prompt('May I have your name?');

    line("Hello, %s!\n", $user_name);

    while ($correct_answers < ATTEMPTS_QTY) {
        list($question, $correct_answer) = $getGameData();

        $user_answer = prompt("Question: " . $question);
        line("Your answer: %s\n", $user_answer);

        $is_correct = $correct_answer === $user_answer ? true : false;

        if ($is_correct === true) {
            $correct_answers += 1;
            line("Correct!\n");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\n\n" .
                "Let's try again, %s!", $user_answer, $correct_answer, $user_name);

            return false;
        }
    }

    line("Congratulations, %s!", $user_name);

    return true;
}
