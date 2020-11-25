<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Zend_View_Helper_ActionForm extends Zend_View_Helper_Abstract
{
    private $_form;
    public function actionForm($form, $params)
    {
        $this->setForm($form);
        foreach ($params as $elementName => $action){
            switch ($action) {
                case 'delete':
                    $this->getForm()->removeElement($elementName);
                    break;
                case 'disable':
                    $this->getForm()->getElement($elementName)->setAttrib("disable", "disable");
                    $this->getForm()->getElement($elementName)->setLabel("Titre grisé");
                    break;
                default:
                    break;
            }
        }
        return $this->_form;
    }
    
    public function setForm($form)
    {
        $this->_form = $form;
        return $this;
    }
    
    public function getForm()
    {
        return $this->_form;
    }
}
