<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Player
 *
 * @author Lukasz
 */
class Poker_Player
{
	public $name = null;
	
	private $hand = null;

	public function __construct($name)
	{
		$this->name = $name;
		$this->hand = new Poker_Hand();
	}
	
	public function setHand(Poker_Hand $hand)
	{
		$this->hand = $hand;
	}
	
	public function getHand()
	{
		return $this->hand;
	}
	
	public function getName()
	{
		return $this->name;
	}
}
