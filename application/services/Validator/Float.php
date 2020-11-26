<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Validator_Float extends Zend_Validate_Abstract
{
    const FLOAT = 'float';
    protected $_messageTemplates = array(self::FLOAT => "'%value%' n'est pas une valeur en virgule flottante");
    
    public function isValid($value) {
        $this->_setValue($value);
        if(!is_float($value)){
            $this->_error();
            return false;
        }
        return true;
    }
}
