<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initExceptionsHandling()
	{
		$plugin = new Zend_Controller_Plugin_ErrorHandler();
		$plugin->setErrorHandlerModule('default')
				->setErrorHandlerController('error')
				->setErrorHandlerAction('error');

		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin($plugin);
		$front->throwExceptions(false);
	}

	protected function _initAutoloader()
	{

		$front = Zend_Controller_Front::getInstance();
//		$front->addModuleDirectory(APPLICATION_PATH . '/../components');
		
		foreach($front->getControllerDirectory() as $k => $directory)
		{
			$files = scandir($directory);
			foreach($files as $file)
			{
				if(stripos($file, 'Controller'))
				{
					include_once $directory . '/' . $file;
				}
			}
		}

		//$this->bootstrap('autoloader');
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->setFallbackAutoloader(true);
		$autoloader->registerNamespace('Core_');

		return $autoloader;
	}

	protected function _initSession()
	{
		try{
			if(!Zend_Session::isStarted())
				Zend_Session::start();
//			Zend_Session::rememberMe(3600);
		}catch(Zend_Session_Exception $e){
			echo $e->getMessage();
		}
	}

	protected function _initDoctype()
	{
		$layout = Zend_Layout::startMvc();
		$registry = Zend_Registry::getInstance();
		$registry->set('layout', $layout);

		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML5');
		$view->headTitle('Poker');

		////$view->headMeta()->setCharset('UTF-8');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
		$view->headMeta()->appendHttpEquiv('Content-Language', 'en-UK');
//		$view->headMeta()->appendHttpEquiv('Reply-to', 'it@brilliantapps.co.uk');
		$view->headMeta()->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1');
		$view->headMeta()->appendName('keywords', '');
		$view->headMeta()->appendName('description', '');
		if($this->getEnvironment() == 'production')
			$view->headMeta()->appendName('robots', 'index, follow');
		else
			$view->headMeta()->appendName('robots', 'noindex, nofollow');
		//$view->headMeta()->appendName('author', 'Łukasz Warzecha');
		//Zend_Debug::dump($this);
	}

	protected function _initJs()
	{
		$view = $this->getResource('view');
	}

	protected function _initHelpers()
	{
		Zend_Controller_Action_HelperBroker::addPath(
			APPLICATION_PATH .'/modules/default/controllers/helpers',
			'Default_Controller_Action_Helper_'
		);

		// view helpers
		$view = Zend_Layout::getMvcInstance()->getView();
		$view->addHelperPath(APPLICATION_PATH.'/views/helpers/', 'Application_View_Helper');
	}
	
	protected function _initConfig()
	{
		//$this->bootstrap('config');
		$config = new Zend_Config($this->getOptions());
		//Zend_Debug::dump($config);
		Zend_Registry::set('config', $config);
		//echo $this->getEnvironment();
		return $config;
	}
}
