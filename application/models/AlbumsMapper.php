<?php

class Application_Model_AlbumsMapper
{
    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Albums');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Albums $album)
    {
        $data = array(
            'title'   => $album->getTitle(),
            'year' => $album->getYear(),
            'artist' => $album->getArtist(),
            'genre' => $album->getGenre(),
            'img' => $album->getImg()
        );
 
        if (null === ($id = $album->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        return $result->current();
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Albums();
            $entry->setId($row->id)
                ->setTitle($row->title)
                ->setYear($row->year)
                ->setArtist($row->artist)
                ->setGenre($row->genre)
                ->setImg($row->img);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function delete($id)
    {
        return $this->getDbTable()->delete('id =' . (int)$id);
    }
}

