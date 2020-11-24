<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Zend_View_Helper_ImageBase64 extends Zend_View_Helper_Abstract
{
    public function imageBase64($src)
    {
        $type = pathinfo($src, PATHINFO_EXTENSION);
        $data = file_get_contents($src);
        return 'data:image/'.$type.';base64,'.base64_encode($data);
    }
}
