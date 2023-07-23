<?php

namespace Src\DAO;
use PDO; 
use Src\Models\User;

class UserDAO extends DBHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $statement = $this->pdo->prepare('SELECT * FROM tab_users;
        ');

            $userData = $statement->fetch(PDO::FETCH_ASSOC);
            var_dump($userData);
    
        return $userData;
    }

    public function getByEmail(string $email): ?User
    {
        $statement = $this->pdo->prepare('SELECT
                email,
                "name",
                "password",
                accessType
            FROM tab_users
            WHERE email = :email;
        ');
        $statement->execute(['email' => $email]);
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
    
        if (!$userData) {
            return null;
        }
    
        $user = new User(
            $userData['email'],
            $userData['password'],
            $userData['accessType']
        );
    
        return $user;
    }
}