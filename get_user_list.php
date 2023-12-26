<?php

function getUsersList(){
    $json = file_get_contents('users.json');
    $users = json_decode($json, true);
    return $users['data'];

    /*return [
        ['login' => 'Петя', 'password' => '$2y$10$uYa/0Jyv/btDSVSQKJ3eg.YA1dSmYj3Mzf9LIh4rR.v3rCJGhrCBy'],//123 - пароль и хэш
        ['login' => 'Алексей', 'password' => '$2y$10$Yd71HHyKqNV/1EJybM3kB.xYIlBPJ5vVGYDeTXT8MMjqfXP9hgiEq'],//345
        ['login' => 'Андрей', 'password' => '$2y$10$AzlC.eOJaZ5KGADoXTSvaeX1aZ/8P/WILYsHoiWRgRog3.ProOpnG'],//567
        ['login' => 'Вася', 'password' => '$2y$10$689N6dAPVsJ.0zg3klxzju7ibaoigmmmmf8xga29pfrehw6jfqsc2e'],//789
        ['login' => 'Анна', 'password' => '$2y$10$82MtEEUp78xnstnj0xEoGO4GGRGb4bvA324AQWFTYv8EUia/cN7fS'],//891
    ];*/
}

