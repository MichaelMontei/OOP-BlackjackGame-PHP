<?php
declare(strict_types=1);

require 'Player.php';
require 'Suit.php';
require 'Card.php';
require 'Deck.php';

class Blackjack
{
    private Player $player;
    private Player $dealer;
    private Deck $deck;

    public function __construct()
    {
        //comes from the example.php

        $deck = new Deck();
        $deck->shuffle();

        foreach($deck->getCards() AS $card)
        {
            echo $card->getUnicodeCharacter(true);
            echo '<br>';
        }

        $this -> player = new Player($deck);
        $this -> dealer = new Player($deck);

    }

//Add the following public methods to the class:

    //getPlayer: returns the player object
    public function getPlayer()
    {
        return $this->player;
    }

    //getDealer: returns the dealer object
    public function getDealer()
    {
        return $this->dealer;
    }

    //getDeck: returns the deck object
    public function getDeck ()
    {
        return $this->deck;
    }


}