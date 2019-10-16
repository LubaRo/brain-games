<?php

namespace BrainGames\EvenGame;

use function \BrainGames\Engine\play_game,
             \BrainGames\Engine\fn_format_answer,
             \BrainGames\Engine\fn_get_random_number;

function even_game_play()
{
    play_game(
        function () {
            $random_num = fn_get_random_number();

            $question = "Question: {$random_num}";
            $correct_answer = fn_get_correct_answer($random_num);

            return array($question, $correct_answer);
        }
    );
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
