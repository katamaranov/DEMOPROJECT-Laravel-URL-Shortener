<?php

/*
*Можно добавить до 10 резервных коллекций (от A до J, т.е от 0 до 9), потому что если больше
*то нужно в web.php дополнительное условие которое проверяло бы сколько первых цифр из slug`a нужно
*выбирать, 1 или 2. А лучше для такого сделать sharding, но мне лень.
*/

return [
    'chunks' => [
        'A',
        'B',
    ]
];