<?php

class IndexController extends Zend_Controller_Action
{
    const AUTH_TABLE = 'users';
    const AUTH_IDENTITY = 'username';
    const AUTH_CREDENTIAL = 'password';
    public function init()
    {
        
        /* Initialize action controller here */
        //die(var_dump(Utils_MyLib::getDate()));
        /*$validator = new Application_Service_Validator_Float();
        var_dump($validator->isValid(30.12));
        die(var_dump($validator->getMessages()));
        $validator = new Application_Service_Validator_PostalCode();
        var_dump($validator->isValid('aa'));
        die(var_dump($validator->getMessages()));
         * 
         */
    }
    
    public function preDispatch() {
        if(Zend_Auth::getInstance()->hasIdentity()){
            if(in_array($this->getRequest()->getActionName(), array('login', 'logingassi'))){
                $this->_helper->redirector('index');
            }
        }else{
            if($this->getRequest()->getActionName() == 'logout'){
                $this->_helper->redirector('index');
            }
        }
    }

    public function indexAction()
    {
        
    }
    
    public function loginAction()
    {
        $db = $this->_getParam('db');
        $loginForm = new Application_Form_Auth_Login();
        if($this->getRequest()->isPost()){
            if($loginForm->isValid($this->getRequest()->getPost())){
                $adapter = new Zend_Auth_Adapter_DbTable(
                        $db,
                        self::AUTH_TABLE,
                        self::AUTH_IDENTITY,
                        self::AUTH_CREDENTIAL,
                        'MD5(?)'
                );
                $adapter->setIdentity($loginForm->getValue(self::AUTH_IDENTITY));
                $adapter->setCredential($loginForm->getValue(self::AUTH_CREDENTIAL));
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
                if($result->isValid()){
                    $this->_helper->FlashMessenger('Successful login');
                    return $this->_helper->redirector('index');
                }
                
                
            }
        }
        $this->view->loginForm = $loginForm;
    }
    
    public function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index');
    }
    
    public function logingassiAction(){
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate(new Application_Service_Auth_Adapter());
        die(print_r($result));
    }
}







