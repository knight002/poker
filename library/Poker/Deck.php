<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Deck
 *
 * @author Lukasz
 */
class Poker_Deck implements IteratorAggregate
{
	protected $cards = array();
	
	public function getIterator()
	{
		return new ArrayIterator($this->cards);
	}

	public function __construct()
	{
		;
	}

	public function shuffle()
	{
		shuffle($this->cards);
	}
	
	public function generateCards()
	{
		foreach (Poker_Card_Ranks::$ranks as $rank)
		{
			foreach (Poker_Card_Suits::$suits as $suit)
			{
				$this->cards[] = new Poker_Card($rank, $suit);
			}
		}
		return $this;
	}
	
	public function makeEmpty()
	{
		$this->cards = array();
	}
	
	public function getCardFromTop()
	{
		$iterator = $this->getIterator();
		$index = $iterator->count() - 1;
		$iterator->seek($index);
		$card = $iterator->current();
		$iterator->offsetUnset($index);
		$this->cards = $iterator->getArrayCopy();
		return $card;
	}
	
	public function addCard($card)
	{
		$this->cards[] = $card;
	}
}
