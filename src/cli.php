<?php

namespace BrainGames\Cli;

use function \cli\line as line;
use function \cli\prompt as prompt;

function run()
{
    $name = prompt('May I have your name?');

    line("Hello, %s!", $name);

    return $name;
}
