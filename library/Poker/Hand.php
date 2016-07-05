<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hand
 *
 * @author Lukasz
 */
class Poker_Hand extends Poker_Deck
{
	//put your code here
	const MAX_CARDS_IN_HAND = 5;
	
	const HAND_RANK_NONE = 0;
	const HAND_RANK_ONE_PAIR = 1;
	const HAND_RANK_TWO_PAIR = 2;
	const HAND_RANK_THREE_OF_A_KIND = 3;
	const HAND_RANK_STRAIGHT = 4;
	const HAND_RANK_FLUSH = 5;
	const HAND_RANK_FULL_HOUSE = 6;
	const HAND_RANK_FOUR_OF_A_KIND = 7;
	const HAND_RANK_STRAIGHT_FLUSH = 8;

	private $handRank = self::HAND_RANK_NONE;

//	public function compare(self $hand)
//	{
//		
//	}

	public function assessRank()
	{
		Zend_Debug::dump($this->hasOnePair(), '$hasOnePair');
		Zend_Debug::dump($this->hasTwoPair(), 'hasTwoPair()');
		die;
	}
	
	private function sortAscByRankIndex(&$array)
	{
		usort($array, function ($a, $b)
		{
			if ($a->rankIndex == $b->rankIndex)
				return 0;
			return $a->rankIndex < $b->rankIndex ? -1 : 1;
		});
	}
	
	/**
	 * Count same ranks
	 * @param array $cards Array holding Poker_Card objects
	 */
	private function getCounts($cards)
	{
		//count values
		$counts = array();
		foreach($cards as $card)
		{
			if(!array_key_exists($card->rankIndex, $counts))
				$counts[$card->rankIndex] = 0;
			$counts[$card->rankIndex]++;
		}
		return $counts;
	}

	private function hasOnePair()
	{
		//count values
		$counts = $this->getCounts($this->cards);		
		$matches = 0;
		foreach($counts as $v)
		{
			if($v == 2)
				$matches++;
		}
		
		if($matches == 1)
			return true;
		
		return false;
	}
	
	private function hasTwoPair()
	{
		$counts = $this->getCounts($this->cards);
		$matches = 0;
		foreach($counts as $v)
		{
			if($v == 2)
				$matches++;
		}
		if($matches == 2)
			return true;
		
		return false;
	}
	
	private function hasStraight()
	{
		$this->sortAscByRankIndex($this->cards);
		return false;
	}
}
