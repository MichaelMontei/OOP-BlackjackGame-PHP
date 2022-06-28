<?php
declare(strict_types=1);

class Dealer extends Player
{
    public function hit($deck): void
    {
        if ($this->getScore()<15){
            do{
                parent::hit($deck);
            }while ($this->getScore()<15);
        }
    }
}