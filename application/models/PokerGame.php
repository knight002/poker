<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PokerGame
 *
 * @author Lukasz
 */
class Application_Model_PokerGame extends Poker_Game
{
	public function __construct()
	{
		//setup table
		$table = new Poker_Table();
		$this->setTable($table);
		
		//add players
		for($i = 1; $i <= 3; $i++)
			$this->addPlayer (new Poker_Player("Player $i"));
		
		//add cards to the deck and shuffle
		$this->getTable()->getDeck()->generateCards()->shuffle();

		//deal cards
		$this->dealCards();
		
		//get players hand and assess it
		$this->getPlayer('Player 1')->getHand()->assessRank();
	}
}
