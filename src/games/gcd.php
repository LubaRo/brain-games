<?php

namespace BrainGames\EvenGame;

use function BrainGames\Engine\play_game;
use function BrainGames\Engine\fn_get_random_number;

function even_game_play()
{
    play_game(
        function () {
            list($num1, $num2, $math_sign) = fn_get_expression_components();
            $expression = "{$num1} {$math_sign} {$num2}";

            $question = "Question: {$expression}";
            $correct_answer = fn_get_correct_answer($num1, $num2, $math_sign);

            return array($question, (string) $correct_answer);
        }
    );
}
