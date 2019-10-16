<?php

namespace BrainGames\Cli;

use function \cli\line as line;
use function \cli\prompt as prompt;

function get_user_name()
{
    $name = prompt('May I have your name?');

    line("Hello, %s!", $name);

    return $name;
}

function greet()
{
    line("Welcome to the Brain Games!\n\n");

    return;
}
