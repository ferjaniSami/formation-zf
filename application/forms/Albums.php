<?php

class Application_Form_Albums extends Zend_Form
{

    public function init()
    {
        $this->setName('album');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');
        // Add an text element
        $this->addElement('text', 'title', array(
            'label'      => 'Title:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'NotEmpty',
                array('validator' => 'StringLength', 'options' => array(0, 200))
            )
        ));
        $year = new Zend_Form_Element_Text('year');
        $year->setLabel('Year:')
                ->setRequired(true)
                ->setErrorMessages(array('Champ obligatoire'))
                ->setValidators(array(
                'Int',
                array('validator' => 'GreaterThan', 'options' => array(date('Y') - 100)),
                array('validator' => 'LessThan', 'options' => array(date('Y'))),
            ));
        $this->addElement($year);
        
        $this->addElement('text', 'artist', array(
            'label'      => 'Artist:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'NotEmpty',
                array('validator' => 'StringLength', 'options' => array(0, 200))
            )
        ));
        
        $genre = new Zend_Form_Element_Select('genre');
        $genre->setLabel('Genre:')
            ->setRequired(true)
            ->setMultiOptions(array('' => '', 'genre1' => 'genre1', 'genre2' => 'genre2'))
            ->setErrorMessages(array('Champ obligatoire'));
        $this->addElement($genre);
        
        $img = new Zend_Form_Element_File('img');
        $img->setLabel('Pochette:')
            ->setRequired(true)
            ->setDestination(APPLICATION_PATH . '/../data/uploads/cover');
            //->setDestination(Application_Service_Config::getConfig('upload.cover.path'));
        // Fait en sorte qu'il y ait un seul fichier
        $img->addValidator('Count', false, 1);
        // limite à 100K
        $img->addValidator('Size', false, 102400);
        // seulement des JPEG, PNG, et GIFs
        $img->addValidator('Extension', false, 'jpg,png,gif');
        //$img->addValidator('Extension', false, Application_Service_Config::getConfig('upload.cover.extension'));
        $this->addElement($img);
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sauvgarder',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}