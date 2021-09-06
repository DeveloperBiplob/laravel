<?php

if(!function_exists('greetings')){

    // ------ composer.json e register korar por obosoy "composer dumpautoload" ai comand ta run korte hobe ----//
    function greetings($name): string
    {
        return 'Hello :' . $name;
    }
}