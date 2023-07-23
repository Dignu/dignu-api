<?php

namespace Src\Models;


class User
{
    public function __construct(
        private string $email,
        private string $password,
        private string $accessType
    ) {
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getAccessType(): string
    {
        return $this->accessType;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setAccessType(string $accessType): void
    {
        $this->accessType = $accessType;
    }

    // Método para definir e encriptar a senha
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Método para verificar a senha
    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}