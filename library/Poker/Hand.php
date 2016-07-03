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
		$hasOnePair = $this->hasOnePair();
		Zend_Debug::dump($hasOnePair, '$hasOnePair');
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

	private function hasOnePair()
	{
		//sort by rank index first
//		Zend_Debug::dump($this->cards, 'UNSORTED');
		$this->sortAscByRankIndex($this->cards);
//		Zend_Debug::dump($this->cards, 'SORTED');
		
//		$cards = array();
//		foreach($this->cards as $k => $card)
//			$cards[$k] = (array)$card;
		
		//count values
		$counts = array();
		foreach($this->cards as $card)
		{
			if(!array_key_exists($card->rankIndex, $counts))
				$counts[$card->rankIndex] = 0;
			$counts[$card->rankIndex]++;
		}
		Zend_Debug::dump($counts);
		return false;
	}
	
	private function hasTwoPair()
	{
		return false;
	}
}
