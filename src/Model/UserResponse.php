<?php

namespace App\Model;

class UserResponse 
{
    private int $id;
    private string $email;
    private string $username;

    public function __construct(
        int $id,
        string $email,
        string $username,
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
    }

    public function __serialize(): array {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "username" => $this->username,
        ];
    }

}