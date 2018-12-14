<?php

namespace ClementPatigny\Model;

class User {
    private $_id;
    private $_login;
    private $_password;
    
    public function __construct(array $user) {
        $this->hydrate($user);
    }
    
    public function hydrate($user) {
        foreach($user as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
    
    public function setId($id) {
        $this->_id = (int) $id;
    }
    
    public function setLogin($login) {
        if (is_string($login)) {
            $this->_login = $login;
        }
    }
    
    public function setPassword($password) {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function getLogin() {
        return $this->_login;
    }
    
    public function getPassword() {
        return $this->_password;
    }
}