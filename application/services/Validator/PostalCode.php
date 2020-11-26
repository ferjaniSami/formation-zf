<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Validator_PostalCode extends Zend_Validate_Abstract
{
    const POSTAL_CODE = 'postal_code';
    const NOT_EMPTY = 'not_empty';
    protected $_messageTemplates = array(
        self::POSTAL_CODE => "Le code postal doit être composé uniquement des chiffres, 5 au maximum",
        self::NOT_EMPTY => "Cette valeur est obligatoire"
    );
    
    public function isValid($value) {
        //todo
        if(!preg_match('/^[0-9]{0,5}$/', $value)){
            $this->_error(self::NOT_EMPTY);
            return false;
        }
        if( $value < 0 || $value > 99999){
            $this->_error(self::POSTAL_CODE);
            return false;
        }
        return true;
    }
}
