<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Webservice_RestController extends Zend_Rest_Controller
{
    private $_server;
    const DEFAULT_REST_SERVICE = 'Application_Service_Rest_Operations';
    public function init() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $this->_server = new Zend_Rest_Server();
        $this->_server->setClass(self::DEFAULT_REST_SERVICE);
        $action = strtolower($this->getRequest()->getActionName());
        $method = strtolower($this->getRequest()->getMethod());
        if($action != $method){
            $this->_server->handle(array('method' => 'error'));
        }
    }
    
    public function indexAction()
    {
        $this->_server->handle();
    }
    
    public function getAction() {
        $this->_server->handle();
    }
    
    public function postAction() {
        $this->_server->handle();
    }
    
    public function putAction() {
        $this->_server->handle();
    }
    
    public function deleteAction() {
        $this->_server->handle();
    }
}

