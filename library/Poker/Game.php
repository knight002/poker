<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author Lukasz
 */
abstract class Poker_Game
{
	protected $players;

	protected $table;
	
	/**
	 * Play the game
	 */
	public function __construct()
	{
		;
	}
	
	public function addPlayer(Poker_Player $player)
	{
		$this->players[$player->getName()] = $player;
	}
	
	public function setTable($table)
	{
		$this->table = $table;
	}
	
	public function getTable()
	{
		return $this->table;
	}
	
	public function dealCards()
	{
		if(count($this->players) < 1)
			throw new Zend_Exception('game must have some players');
		
		for($i = 0; $i < Poker_Hand::MAX_CARDS_IN_HAND; $i++)
		{
			foreach ($this->players as $playerKey => $player)
			{
				//take a card from the deck and add to users hand
				$card = $this->table->getDeck()->getCardFromTop();
				$player->getHand()->addCard($card);
			}
		}
		
		Zend_Debug::dump($this->getPlayer('Player 1'));
	}
	
	/**
	 * 
	 * @param String $name
	 * @return boolean | Poker_Player
	 */
	public function getPlayer($name)
	{
		if(array_key_exists($name, $this->players))
		{
			return $this->players[$name];
		}
		return false;
	}
	
}
