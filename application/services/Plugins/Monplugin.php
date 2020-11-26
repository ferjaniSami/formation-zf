<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Plugins_Monplugin extends Zend_Controller_Plugin_Abstract
{
    public function routeStartup(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">routeStartup appelée</p>');
    }
    
    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">routeShutdown appelée</p>');
    }
    
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">dispatchLoopStartup appelée</p>');
    }
    
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">preDispatch appelée</p>');
    }
    
    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">postDispatch appelée</p>');
    }
    
    /*public function dispatchLoopShutdown(Zend_Controller_Request_Abstract $request) {
        $this->getResponse()->appendBody('<p style="color:red">dispatchLoopShutdown appelée</p>');
    }*/
}