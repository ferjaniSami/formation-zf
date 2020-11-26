<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    public function authenticate()
    {
        if(!isset($_SERVER['HTTP_SM_UNIVERSALID'])){
            $code = Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID;
            $identity = null;
        }else{
            $identity = array('username' => $_SERVER['HTTP_SM_UNIVERSALID']);
            $code = Zend_Auth_Result::SUCCESS;
        }
        return new Zend_Auth_Result($code, $identity);
    }

}