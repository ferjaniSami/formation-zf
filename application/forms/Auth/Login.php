<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Form_Auth_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
        $userName = new Zend_Form_Element_Text('username');
        $userName->setLabel('Username:')
                ->setRequired(true)
                ->setFilters(array('StringTrim'));
        $this->addElement($userName);
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
                ->setRequired(true);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Login');
        
        $this->addElements(array($password, $submit));
    }
}