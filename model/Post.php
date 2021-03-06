<?php

namespace ClementPatigny\Model;

class Post {
    private $_id;
    private $_title;
    private $_content;
    private $_creationDate;
    private $_nbComments;
    private $_author;
    
    public function __construct(array $post) {
        $this->hydrate($post);
    }
    
    public function hydrate($post) {
        foreach($post as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
    
    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }
    
    public function setTitle($title) {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }    
    
    public function setId($id) {
        $this->_id = (int) $id;
    }    
    
    public function setAuthor($author) {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }        
    
    public function setNbComments($nbComments) {
        $this->_nbComments = (int) $nbComments;
    }    
    
    public function setCreationDate($creationDate) {
        $this->_creationDate = new \datetime($creationDate);
    }

    public function getContent() {
        return $this->_content;
    }
    
    public function getTitle() {
        return $this->_title;
    }    
    
    public function getId() {
        return $this->_id;
    }    
    
    public function getAuthor() {
        return $this->_author;
    }    
    
    public function getCreationDate($format) {
        return $this->_creationDate->format($format);
    }
    
    public function getNbComments() {
        return $this->_nbComments;
    }
}
