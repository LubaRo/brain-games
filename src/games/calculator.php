<?php

namespace BrainGames\CalculatorGame;

use function \cli\line as line;
use function \cli\prompt as prompt;

function calculator_game_run($user_name)
{
    $correct_answers = 0;

    while ($correct_answers < 3) {
        list($is_correct, $correct_answer, $user_answer) = fn_ask_question();

        if ($is_correct === true) {
            $correct_answers += 1;
            line("Correct!\n");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\n\n" .
                "Let's try again, %s!", $user_answer, $correct_answer, $user_name);

            return false;
        }
    }

    line("Congratulations, %s!\n", $user_name);
}
