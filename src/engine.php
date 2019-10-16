<?php

namespace BrainGames\Engine;

use function \cli\line,
             \cli\prompt,
             BrainGames\Cli\get_user_name,
             BrainGames\Cli\greet;

function fn_format_answer($input)
{
    $formatted = mb_strtolower(trim($input));

    return $formatted;
}

function fn_check_answer($correct_answer, $user_answer)
{
    $format_answer = fn_format_answer($user_answer);
    $is_correct = $correct_answer === $format_answer ? true : false;

    return $is_correct;
}

function fn_get_random_number($min = 1, $max = 100)
{
    return rand($min, $max);
}

function play_game(callable $fn_ask_question)
{
    greet();

    if (defined('GAME_RULES')) {
        line(GAME_RULES);
    }

    $user_name = get_user_name();

    $correct_answers = 0;

    while ($correct_answers < 3) {
        list($question, $correct_answer) = $fn_ask_question();

        $user_answer = prompt($question);
        line("Your answer: %s!\n", $user_answer);

        $is_correct = fn_check_answer($correct_answer, $user_answer);

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

    return true;
}
