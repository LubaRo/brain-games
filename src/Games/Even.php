<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\play_game;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function even_game_play()
{
    $fn_ask_question = function () {
        $random_num = rand(1, 100);

        $question = "{$random_num}";
        $correct_answer = fn_get_correct_answer($random_num);

        return array($question, $correct_answer);
    };

    play_game(DESCRIPTION, $fn_ask_question);

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
