<?php

class Application_Model_Albums
{
    protected $_title;
    protected $_year;
    protected $_artist;
    protected $_genre;
    protected $_img;
    protected $_id;
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid album property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid album property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function setTitle($title)
    {
        $this->_title = (string) $title;
        return $this;
    }
 
    public function getTitle()
    {
        return $this->_title;
    }
 
    public function setYear($year)
    {
        $this->_year = (int) $year;
        return $this;
    }
 
    public function getYear()
    {
        return $this->_year;
    }
 
    public function setArtist($artist)
    {
        $this->_artist = $artist;
        return $this;
    }
 
    public function getArtist()
    {
        return $this->_artist;
    }
    
    public function setGenre($genre)
    {
        $this->_genre = $genre;
        return $this;
    }
    
    public function getGenre()
    {
        return $this->_genre;
    }
    
    public function setImg($img)
    {
        $this->_img = $img;
        return $this;
    }
    
    public function getImg()
    {
        return $this->_img;
    }
 
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
 
    public function getId()
    {
        return $this->_id;
    }

}

