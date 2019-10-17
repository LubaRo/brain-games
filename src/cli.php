<?php

namespace BrainGames\Cli;

use function cli\line as line;
use function cli\prompt as prompt;

function get_user_name()
{
    $name = prompt('May I have your name?');

    line("Hello, %s!\n", $name);

    return $name;
}

function greet()
{
    line("\nWelcome to the Brain Games!");

    return;
}
