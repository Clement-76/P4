<?php

namespace ClementPatigny\Model;

class Article {
    protected $summary;
    protected $id;
    protected $title;
    protected $content;
    protected $creationDate;
    protected $autor;
    
    public function __construct(array $article) {
        $this->hydrate($article);
    }
    
    public function hydrate($article) {
        foreach($article as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        $this->setSummary($article['content']);
    }
    
    public function setContent($content) {
        if (is_string($content)) {
            $this->content = $content;
        }
    }
    
    public function setTitle($title) {
        if (is_string($title)) {
            $this->title = $title;
        }
    }    
    
    public function setId($id) {
        $this->id = (int) $id;
    }    
    
    public function setAutor($autor) {
        if (is_string($autor)) {
            $this->autor = $autor;
        }
    }    
    
    public function setCreationDate($creationDate) {
        $timestamp = strtotime($creationDate);
        $date = date('d/m/Y', $timestamp);
        $this->creationDate = $date;
    }
    
    public function setSummary($content) {
        $words = explode(" ", $content);

        if (count($words) < 25) {
            $this->summary = $content;
        } else {
            for ($i = 0; $i < 25; $i++) {
                if ($i == 24) {
                    $this->summary .= $words[$i] . '...';
                } else {
                    $this->summary .= $words[$i] . ' ';
                }
            }
        }
    }
        
    public function getContent() {
        return htmlspecialchars($this->content);
    }
    
    public function getTitle() {
        return htmlspecialchars($this->title);
    }    
    
    public function getId() {
        return $this->id;
    }    
    
    public function getAutor() {
        return htmlspecialchars($this->autor);
    }    
    
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function getSummary() {
        return htmlspecialchars($this->summary);
    }
}
