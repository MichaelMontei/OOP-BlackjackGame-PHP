<?php
declare(strict_types=1);

//Create a class called Player
//Add 2 private properties: cards (array) and lost (boolean)
//Add public methods to this class (hit, surrender, getScore and hasLost)

class Player
{
    private array $cards = [];
    private bool $lost = false;

    //constructor: make it expect th Deck for the parameters

    public function __construct(Deck $deck)
    {
        for($i=0; $i<2; $i++)
        {
            $this->cards[] = $deck->drawCard();
        }

    }

    //getter
    public function getCards(): array
    {
        return $this->cards;
    }

    //Setter
    public function setCards($cards): void
    {
        $this->cards = $cards;
    }



    public function hit($deck): void
    {
        //public method to hit
        $this->cards[] = $deck->drawCard();

       if($this->getScore()>21){
            $this->hasLost();
        }
    }
    public function surrender(): void
    {
        $this->lost = true;
    }
    public function getScore(): int
    {
        //public method to getScore
        $playerScore = 0;

        foreach ($this->cards AS $card){
            $playerScore += $card->getValue();
        }
        return $playerScore;

    }
    public function hasLost(): void
    {
        $this->lost =true;
    }
}
