<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Config extends Zend_Service_Abstract
{
    const DELIMITER = '.';

    public static function getConfig($confName)
    {
        $configs = Zend_Registry::get('config');
        $names = explode(self::DELIMITER, $confName);
        foreach ($names as $name){
            $configs = $configs->$name;
        }
        return $configs;
    }
    
    /*
     * 
     * public static function getConfig($confName, $file = self::DEFAULT_CONFIG_FILE)
    {
        if($file == self::DEFAULT_CONFIG_FILE)
            $configs = Zend_Registry::get('config');
        else{
            $configs = new Zend_Config_Ini(APPLICATION_CONF_PATH.$file, APPLICATION_ENV);
        }  
        $names = explode(self::DELIMITER, $confName);
        foreach ($names as $name){
            $configs = $configs->$name;
        }
        return $configs;
    }
     */
}

