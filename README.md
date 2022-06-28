# Title: OOP: Blackjack

Instructions:

- [X] 1. Create a class called Player in the file Player.php.
	<?php

	declare(strict_types=1);

	class Player
	{

	} 
	
- [X] 2. Add 2 private properties: cards (array) and lost (bool, default = false)
	private array $cards;
	private bool $lost;

- [X] 3. Add a couple of empty public methods to this class: (hit, surrender, getScore and hasLost)
	public function hit() {

	}
    
	public function surrender() {

	}
    
	public function getScore() {
        
	}
    
	public function hasLost() {
        
	}

- [X] 4. Create a class called Blackjack in the file Blackjack.php
	<?php

	declare(strict_types=1);

	class Blackjack
	{

	}
	
- [X] 5. Add 3 private properties: player (Player), dealer (Player for now) and deck (Deck)
	private Player $player;
	private Player $dealer;
	private Deck $deck;


- [X] 6. Add the following public methods: getPlayer (returns the player object, getPlayer (returns the player object) and getDeck (returns the deck object)
				
	/**
	* @return Player
	*/
	public function getPlayer(): Player
	{
    		return $this->player;
	}

	/**
	* @return Player
	*/
	public function getDealer(): Player
	{
    		return $this->dealer;
	}

	/**
	* @return Deck
	*/
	public function getDeck(): Deck
	{
    		return $this->deck;
	
}
- [X] 7. In the constructor do the following: 
	- [X] Instantiate the Player class twice, insert it into the player property and a dealer property.
	- [X] Create a new deck object (code has already been written for you!).
	- [X] Shuffle the cards with shuffle method on deck.
		
	public function __construct()
	{
  		$this->player = new Player();
  		$this->dealer = new Player();
  		$this->deck = new Deck();
  		$this->deck->shuffle();
	}
		
- [X] 8. In the constructor of the Player class:
	- [X] Make it expect the Deck object as a parameter.
	- [X] Pass this Deck from the Blackjack constructor
	- [X] Now draw 2 cards for the player. You have to use an existing method for this from the Deck class.

	public function __construct(Deck $deck)
	{
  		 $this->lost = false;
  		 $this->cards = [];
   	for ($i=0; $i<2; $i++) {
      		 $this->cards[] = $deck->drawCard();
      	}
	}

- [X] 9. Go back to the Player class and add the following logic in your empty methods:
		- [X]  getScore loops over all the cards and returns the total value of that player.

	public function getScore(): int
    	{
        	//public method to getScore
        	$playerScore = 0;

        foreach ($this->cards AS $card){
            	$playerScore += $card->getValue();
        }
        return $playerScore;

    	}

	- [X] hasLost will return the bool of the lost property.

	public function hasLost(): void
    	{
        	$this->lost =true;
    	}

	- [X] hit should add a card to the player. If this brings him above 21, set the lost property to true. To count his score use the method getScore you wrote earlier. This method should expect the $deck variable as an argument from outside, to draw the card.
		
	public function hit(Deck $deck) : void 
	{
  		$this->cards[] += $deck->drawCard();
  		if ($this->getScore($this->cards) > 21){
      			$this->lost = true;
  	}
	}

	- [X] surrender should make you surrender the game (The dealer wins). This sets the property lost in the player instance to true.

	public function surrender() : bool {
  		return $this->lost = true;
	}

#### Dive a little deeper to 12 meters and create the index.php file
- Create an `index.php` file with the following code:
  - [x] Require all the files with the classes you already created. Ideally you want a **separate file** for each class.
  - ```php
    <?php
    declare(strict_types=1);
    
    require 'code/Blackjack.php';
    require 'code/Card.php';
    require 'code/Deck.php';
    require 'code/Player.php';
    require 'code/Suit.php';
    ```
  - [x] Start the PHP session.
  - An important thing about the `session_start()` function is that it must be called at the beginning of the script, before any output is sent to the browser. Otherwise, you'll encounter the infamous `Headers are already sent` error.
  - ```php
    session_start();
    ```
  - If the session does not have a `Blackjack` variable yet:
    - [x] Create a new `Blackjack` object.
    - [x] Put the `Blackjack` object in the session.
  - ```php
    $blackjack = new Blackjack();
    $_SESSION['blackjack'] = $blackjack;
    ```
- [ ] Use buttons or links to send to the `index.php` page what the player's action is (i.e. hit/stand/surrender).

Normally everything we needed to do for the player should be done at this depth. Take a moment to enjoy the view at this depth, take it all in.

#### Let's dive to a depth of 15 meters and take a look at the dealer
At this moment we still have the same rules for the player and the dealer, but there is an important difference.
The dealer keeps playing with the `hit` function until he has **at least** 15. So how will we fix this at our current depth:
- To change this behaviour:
  - [ ] We are going to [extend](https://www.php.net/manual/en/language.oop5.inheritance.php) the `player` class and extend it to a newly created `dealer` class.
  - [ ] Change the `Blackjack` class to create a new `dealer` object instead of a `player` object for the property of the dealer.
  - [ ] Create a `hit` function that keeps drawing cards until the dealer has **at least** 15 points. Watch out at these depths, because there are tricky parts. We also need the `lost` check we already had in the `hit` function of the player. We could just dive up to it and copy the code, but this is never the solution. But if we take a good look around at this depth there is a chance we will spot a "Parrot fish" and on his sides you will find `parent::hit();`, we can then use this piece of code to call the old `hit` function.

#### Let's go for the final push and dive to 18 meters
Now that all our classes are ready we just need to keep breathing calmly, we don't want to run out of oxygen at this depth.
The only thing we need to do now is write some minimal glue in the `index.php`. We can try and find a `sandcastle worm' for some extra sticky underwater glue.
The final result we want should be the following:

- [ ] When we click the hit button, call `hit` on the player, then check the lost status of the player. We need to pass a `Deck` variable to this function, we can use the `Blackjack::getDeck()` method for this.
- [ ] When we click the stand button, call `hit` on the dealer, then check the lost status of the dealer. If he is not lost, compare scores to set the winner (if it's equal the house always wins).
- [ ] If we click surrender, the dealer automatically wins.
- [ ] On the page we always want to display the scores of both players.
- [ ] If there is a winner, display it.
- [ ] End of the game, destroy the current `blackjack` variable so the game restarts.

### For the Advanced Open Water SCUBA Divers these are nice to have
- Implement an underwater betting system
  - [ ] Every new diver (player) (new session) starts with 100 🐚 shells.
  - [ ] After the diver gets his 2 first cards, every round, ask how much he wants to bet. He needs to bet at least 5 🐚 shells.
  - [ ] If the diver wins the bet he gains double the amount of 🐚 shells.
- Implement the blackjack first turn rule:
  - [ ] If the diver draws 21 the first turn: he directly wins.
  - [ ] If Neptune (dealer) draws 21 the first turn, he wins.
  - [ ] If both draw 21, it is a tie.
  - When you implement these nice to have features:
    - [ ] A blackjack means an auto win of 10 🐚 shells.
    - [ ] A blackjack for Neptune, a loss of 5 🐚 shells for the diver.

## Some diving TIPS
- Be sure to check the pre made classes and the `example.php` file. This file shows how you can easily get some graphical presentation for the cards to spice up your game during the dive.
- Try to avoid referring to `$_SESSION` inside your objects, because this breaks [encapsulation](https://en.wikipedia.org/wiki/Encapsulation_(computer_programming)). If you need it, pass it as an argument.
- Stuck? Check the FAQ that is included in the repo for some of the most common problems.


## Let's dive in 🤿