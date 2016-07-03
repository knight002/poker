<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Table
 *
 * @author Lukasz
 */
class Poker_Table
{	
	public $deck = null;
	
	public $usedCards = array();
	
	public function __construct()
	{
		$this->deck = new Poker_Deck();
		$this->usedCards = new Poker_Deck();
	}
	
	public function getDeck()
	{
		return $this->deck;
	}
	
	protected function getUsedCards()
	{
		return $this->usedCards;
	}
}
