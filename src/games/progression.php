<?php

namespace BrainGames\ProgressionGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

function progression_game_run()
{
    play_game(
        function () {

            $progression_numbers = fn_get_progression_numbers();
            list($question, $correct_answer) = fn_get_question_data($progression_numbers);

            return array($question, (string) $correct_answer);
        }
    );
}

function fn_get_progression_numbers($qty = 10)
{
    $progression_numbers = array();
    $progression_step = fn_get_random_number();

    for ($i = 0; $i < 10; $i++) {
        if (!isset($progression_numbers[$i - 1])) {
            $progression_numbers[$i] = fn_get_random_number() + $progression_step;
        } else {
            $progression_numbers[$i] = $progression_numbers[$i - 1] + $progression_step;
        }
    }

    return $progression_numbers;
}

function fn_get_question_data($progression_numbers, $replace = '..')
{
    $qty = sizeof($progression_numbers);
    $hidden_num_postion = fn_get_random_number(1, $qty);

    $answer = $progression_numbers[$hidden_num_postion];
    $progression_numbers[$hidden_num_postion] = $replace;

    $question = implode(' ', $progression_numbers);

    return array($question, $answer);
}
