<?php

class AlbumController extends Zend_Controller_Action
{
    private $_mapper;
    public function init()
    {
        $this->_mapper = Application_Service_DI::getAlbumMapper();
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
        $id = (int) $this->getRequest()->getParam('id', 0);
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
            $this->_mapper->delete($id);
            echo Zend_Json::encode(array('msg' => 'Album deleted'));
        }else{
            $this->_mapper->delete($id);
            $this->_helper->flashMessenger('Album deleted');
            return $this->_helper->redirector('index');
        }
    }
    
    public function deleteajaxAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        if($this->getRequest()->isXmlHttpRequest()){
            $id = (int) $this->getRequest()->getParam('id', 0);
            $this->_mapper->delete($id);
            echo Zend_Json::encode(array('msg' => 'Album deleted'));
        }else{
            $this->getResponse()->setHttpResponseCode(404);
            echo 'Album not deleted';
        }
        
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', 0);
        $form = new Application_Form_Albums();
        $album = $this->_mapper->find($id);
        $img = $album->img;
        if($this->getRequest()->isPost()){
            $values = $this->getRequest()->getParams();
            $values['img'] = $img;
            $album = new Application_Model_Albums($values);
            $this->_mapper->save($album);
        }else{   
            $form->populate(array(
                'title' => $album->title,
                'year' => $album->year,
                'artist' => $album->artist,
                'genre' => $album->genre,
            ));
        }
        //$form = $this->_helper->actionForm($form);
        $this->view->form = $form;
        
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







