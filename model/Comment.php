<?php 

namespace  ClementPatigny\Model;

class Comment {
    
    private $_author;
    private $_content;
    private $_id;
    private $_nbReports;
    private $_creationDate;
    
    public function __construct(array $comment) {
        $this->hydrate($comment);
    }
    
    public function hydrate($comment) {
        foreach($comment as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
    
    public function setAuthor($author) {
        $this->_author = $author;
    }
    
    public function setContent($content) {
        $this->_content = $content;
    }
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function setNbReports($nbReports) {
        $this->_nbReports = $nbReports;
    }
    
    public function setCreationDate($creationDate) {
        $this->_creationDate = new \datetime($creationDate);
    }
    
    public function getAuthor() {
        return htmlspecialchars($this->_author);
    }
    
    public function getContent() {
        return $this->_content;
    }
        
    public function getId() {
        return $this->_id;
    }
    
    public function getNbReports() {
        return $this->_nbReports;
    }
    
    public function getCreationDate($format) {
        return $this->_creationDate->format($format);
    }
}
