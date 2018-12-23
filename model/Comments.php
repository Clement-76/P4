<?php 

namespace  ClementPatigny\Model;

class Comments {
    
    private $_author;
    private $_content;
    
    public function __construct($author, $content) {
        $this->setAuthor($author);
        $this->setContent($content);
    }
    
    public function setAuthor($author) {
        
    }
    
    public function setContent($content) {
        
    }
    
    public function getAuthor() {
        return $this->_author;
    }
    
    public function getContent() {
        return $this->_content;
    }
}