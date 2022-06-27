# Title: OOP: Blackjack

Instructions:

- [X] 1. Create a class called Player in the file Player.php.
	- Made a new Player.php and added the class Player 
	
- [X] 2. Add 2 private properties: cards (array) and lost (bool, default = false)
	- private array $cards;
	-private bool $lost = false;

- [X] 3. Add a couple of empty public methods to this class: (hit, surrender, getScore and hasLost)
	- public function hit(){}
	- public function surrender(){}
	- public function getScore(){}
	- public function hasLost(){}

- [X] 4. Create a class called Blackjack in the file Blackjack.php
	- Made a new Blackjack.php and added the class Blackjack
	
- [X] 5. Add 3 private properties: player (Player), dealer (Player for now) and deck (Deck)
	- private Player $player;
	- private Player $dealer; 
 	- private Deck $deck;


- [X] 6. Add the following public methods: getPlayer (returns the player object, getPlayer (returns the player object) and getDeck (returns the deck object)
	- public function getPlayer()
    		{
        	   return $this->player;
    		}
	- public function getDealer()
    		{
        	   return $this->dealer;
    		}
	-  public function getDeck ()
    		{
       		   return $this->deck;
    		}