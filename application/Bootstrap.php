<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initLayout()
    {
        $options = array(
            'layout'     => 'layout',
            'layoutPath' => APPLICATION_PATH.'/layouts/scripts/',
            'contentKey' => 'content'
        );
        $layout = Zend_Layout::startMvc($options);
        return $layout;
    }
    
    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
        return $config;
    }
    
    protected function _initView()
    {
        // Initialisons la vue
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle('My First Zend Framework Application');
 
        // Ajoutons l� au ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        $viewRenderer->setView($view);
 
        // Retourner la vue pour qu'elle puisse �tre stock�e par le bootstrap
        return $view;
    }
    
    protected function _initRoute()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        include APPLICATION_PATH . '/configs/routes.php';
    }
}

