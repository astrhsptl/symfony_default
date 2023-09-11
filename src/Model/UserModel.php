<?php

namespace App\Model;

class UserModel 
{
    private int $id;
    private string $email;
    private string $username;
    private array $roles;

    public function __construct(
        int $id,
        string $email,
        string $username,
        array $roles,
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->roles = $roles;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRoles(): array
    {
        return array_unique($this->roles);
    }
}