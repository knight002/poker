<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Card
 *
 * @author Lukasz
 */
class Poker_Card
{
	public $suit = null;
	public $rank = null;
	public $rankIndex = null;
	
	public function __construct($rank, $suit)
	{
		$this->rank = $rank;
		$this->suit = $suit;
		$this->rankIndex = array_search($rank, Poker_Card_Ranks::$ranks);
		if($this->rankIndex === false)
			throw new Zend_Exception('illegal card');
	}
	
	public function getSuit()
	{
		return $this->suit;
	}
	
	public function getRank()
	{
		return $this->rank;
	}
}
