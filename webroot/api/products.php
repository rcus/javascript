<?php
$products = [
    [
        "pid" => 1,
        "img" => "http://dbwebb.se/img/bok/javascript-the-definitive-guide.jpg",
        "author" => "D. Flanagan",
        "title" => "JavaScript: The Definitive Guide",
        "price" => 310
    ],
    [
        "pid" => 2,
        "img" => "http://dbwebb.se/img/bok/javascript-the-good-parts.jpg",
        "author" => "D. Crockford",
        "title" => "JavaScript: The Good Parts",
        "price" => 188
    ],
    [
        "pid" => 3,
        "img" => "http://dbwebb.se/img/bok/jquery-novice-to-ninja.jpg",
        "author" => "E. Castledine, C. Sharkie",
        "title" => "jQuery Novice To Ninja",
        "price" => 271
    ],
    [
        "pid" => 4,
        "img" => "http://dbwebb.se/img/bok/pro-php-and-jquery.jpg",
        "author" => "J. Lengstorf",
        "title" => "Pro PHP and jQuery",
        "price" => 400
    ]
];
 
header('Content-type: application/json');
echo json_encode($products);