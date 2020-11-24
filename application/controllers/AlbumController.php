<?php

class AlbumController extends Zend_Controller_Action
{
    private $_mapper;
    public function init()
    {
        $this->_mapper = new Application_Model_AlbumsMapper();
    //$this->_helper->layout()->setLayout('layout1');
        /* Initialize action controller here
        $bootstrap = $this->getInvokeArg('bootstrap');
        $options = $bootstrap->getOptions();
        
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        $options = $bootstrap->getOptions();
         * 
         */
    }

    public function indexAction()
    {
        $this->view->albums = $this->_mapper->fetchAll();
    }

    public function deleteAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }

    public function addAction()
    {
        $form = new Application_Form_Albums();
        $request = $this->getRequest();
        //obligatoire pour la reception des fichiers
        $values = $form->getValues();
        if($this->getRequest()->isPost()){
            if($form->isValid($request->getPost())){
                if(!$form->img->receive()){
                    print "Erreur d'upload";
                }else{
                    $album = new Application_Model_Albums($form->getValues());
                    $this->_mapper->save($album);
                    return $this->_helper->redirector('index');
                }
                
            }
        }
        $this->view->form = $form;
    }
}







