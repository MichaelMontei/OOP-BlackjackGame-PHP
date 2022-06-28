<?php
declare(strict_types=1);

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

        $this->deck =$deck;
        $this -> player = new Player($deck);
        $this -> dealer = new Player($deck);

    }

//Add the following public methods to the class:

    //getPlayer: returns the player object
    public function getPlayer(): Player
    {
        return $this->player;
    }

    //getDealer: returns the dealer object
    public function getDealer(): Player
    {
        return $this->dealer;
    }

    //getDeck: returns the deck object
    public function getDeck (): Deck
    {
        return $this->deck;
    }

    public function setPlayer($player): void
    {
        $this->player = $player;
    }


    public function setDealer($dealer): void
    {
        $this->dealer = $dealer;
    }


    public function setDeck($deck): void
    {
        $this->deck = $deck;
    }
}