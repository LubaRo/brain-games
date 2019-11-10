<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play_game;

function progression_game_run()
{
    $game_rules = "What number is missing in the progression?\n";
    $fn_ask_question = function () {
        $progression_numbers = fn_get_progression_numbers();
        list($question, $correct_answer) = fn_get_question_data($progression_numbers);

        return array($question, (string) $correct_answer);
    };

    play_game($game_rules, $fn_ask_question);
}

function fn_get_progression_numbers($qty = 10)
{
    $progression_numbers = array();
    $progression_step = rand(1, 100);

    for ($i = 0; $i < 10; $i++) {
        if (!isset($progression_numbers[$i - 1])) {
            $progression_numbers[$i] = rand(1, 100) + $progression_step;
        } else {
            $progression_numbers[$i] = $progression_numbers[$i - 1] + $progression_step;
        }
    }

    return $progression_numbers;
}

function fn_get_question_data($progression_numbers, $replace = '..')
{
    $qty = sizeof($progression_numbers);
    $hidden_num_postion = rand(1, $qty);

    $answer = $progression_numbers[$hidden_num_postion];
    $progression_numbers[$hidden_num_postion] = $replace;

    $question = implode(' ', $progression_numbers);

    return array($question, $answer);
}
