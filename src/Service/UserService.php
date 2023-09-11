<?php

namespace App\Service;

use App\Entity\User;
use App\Model\UserModel;
use App\Model\UserResponse;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserService 
{
    public function __construct()
    {
      
    }

    public function checkUser(Request $request, UserPasswordHasherInterface $hasherPassword): UserResponse {
        $repository = $doctrine->getRepository(User::class);

        $user = $repository->findOneBy(["username" => $this->email]);

        return new UserResponse();
    }
    
}