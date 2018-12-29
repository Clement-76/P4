<?php

namespace ClementPatigny\Model;

class UserManager extends Manager {
    public function getUser($login) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT * FROM users WHERE user_login = ?');
        $q->execute([$login]);
        $user = $q->fetch();
        
        $userFeatures = [
            'id' => $user['id'],
            'login' => $user['user_login'],
            'password' => $user['user_password'],
            'pseudo' => $user['user_pseudo']
        ];
        
        $userObj = new User($userFeatures);
        return $userObj;
    }
}