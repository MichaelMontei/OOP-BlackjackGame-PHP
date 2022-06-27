<?php
declare(strict_types=1);

require 'Blackjack.php';
require 'Suit.php';
require 'Card.php';
require 'Deck.php';
//Create a class called Player
//Add 2 private properties: cards (array) and lost (boolean)
//Add public methods to this class (hit, surrender, getScore and hasLost)

class Player
{
    private array $cards;
    private bool $lost = false;

    //constructor: make it expect th Deck for the parameters

    public function __construct(Deck $deck)
    {

    }

    public function hit()
    {
        //public method to hit
    }
    public function surrender()
    {
        $this->lost = true;
    }
    public function getScore()
    {
        //public method to getScore
    }
    public function hasLost()
    {
        return $this->lost;
    }
}
