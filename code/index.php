<?php
declare(strict_types=1);

require 'code/Blackjack.php';
require 'code/Card.php';
require 'code/Deck.php';
require 'code/Player.php';
require 'code/Suit.php';

session_start();
$blackjack = new Blackjack();
$_SESSION['blackjack'] = $blackjack;





?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blackjack</title>
</head>
<body>
test
</body>
</html>