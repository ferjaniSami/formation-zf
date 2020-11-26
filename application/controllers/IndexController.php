<?php

class IndexController extends Zend_Controller_Action
{

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

    public function indexAction()
    {
        // action body
        $bootstrap = $this->getInvokeArg('bootstrap');
        $options = $bootstrap->getOptions();
        //die(print_r($options));
    }
    
    public function loginAction()
    {
        $db = $this->_getParam('db');
        $loginForm = new Application_Form_Auth_Login();
        
        $this->view->loginForm = $loginForm;
    }
}







