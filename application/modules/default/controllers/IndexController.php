<?php

class Default_IndexController extends Zend_Controller_Action
{
	/**
	 * Application config
	 * @var Zend_Registry Application config
	 */
	private $appConfig;

	public function init()
	{
		$this->appConfig = $this->view->appConfig = Zend_Registry::get('config');

		//$this->_helper->viewRenderer->setNoRender(true);
		$this->view->assign($this->_getAllParams());
	}
	
	public function indexAction()
	{
		$game = new Application_Model_PokerGame();
		Zend_Debug::dump($game);
	}
}
