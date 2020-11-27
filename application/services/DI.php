<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_DI extends Zend_Service_Abstract
{
    private static $instances = array();
    
    public static function get($class, $singletion = false, $params = null)
    {
        try{
            $instance = null;
            if(array_key_exists($class, static::$instances)){
                $instance = static::$instances[$class];
            }else{
                if($singletion){
                    $instance = $class::getInstance();
                }else{
                    if($params){
                        $instance = new $class($params);
                    }else{
                        $instance = new $class();
                    }
                }
                static::$instances[$class] = $instance;
            }
            return $instance;
        } catch (Exception $ex) {
            return null;
        }
    }
    
    public static function set($class, $instance)
    {
        static::$instances[$class] = $instance;
    }
    
    public static function clear()
    {
        static::$instances = array();
    }
    
    public static function getAlbumMapper()
    {
        return self::get('Application_Model_AlbumsMapper');
    }
}
