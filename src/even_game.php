<?php

namespace BrainGames\EvenGame;

use function \cli\line as line;
use function \cli\prompt as prompt;

function even_game_run($user_name)
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

function fn_get_random_number()
{
    return rand();
}

function fn_ask_question()
{
    $random_num = fn_get_random_number();
    $user_answer = prompt("Question: {$random_num}\n");

    list($is_correct, $correct_answer) = fn_check_answer($random_num, $user_answer);

    return array($is_correct, $correct_answer, $user_answer);
}

function fn_check_answer($number, $user_answer)
{
    $format_answer = fn_format_answer($user_answer);
    $correct_answer = fn_get_correct_answer($number);

    $is_correct = $correct_answer === $format_answer ? true : false;

    return array($is_correct, $correct_answer);
}

function fn_format_answer($input)
{
    $formatted = mb_strtolower(trim($input));

    return $formatted;
}

function fn_is_even($number)
{
    return !($number & 1);
}

function fn_get_correct_answer($number)
{
    $answer = fn_is_even($number);

    return $answer === true ? 'yes' : 'no';
}
