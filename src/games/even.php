<?php

namespace BrainGames\EvenGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

function even_game_play()
{
    $game_rules =  "Answer \"yes\" if number even otherwise answer \"no\".\n";
    $fn_ask_question = function () {
        $random_num = fn_get_random_number();

        $question = "{$random_num}";
        $correct_answer = fn_get_correct_answer($random_num);

        return array($question, $correct_answer);
    };

    play_game($game_rules, $fn_ask_question);

    return true;
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
