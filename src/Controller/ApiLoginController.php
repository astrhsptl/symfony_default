<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserLoginRequest;
use OpenApi\Attributes\RequestBody;

use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class ApiLoginController extends AbstractController
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    

    #[Route('/api/v1/login', name: 'api_login', methods: ["POST"])]
    #[RequestBody(attachables: [new Model(type: UserLoginRequest::class)])] 
    public function login(#[CurrentUser] ?User $user): Response
    {
        return $this->json([
            'user' => $user,
        ]);
    }
}
