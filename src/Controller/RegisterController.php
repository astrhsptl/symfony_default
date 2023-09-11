<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserRegisterRequest;

use OpenApi\Attributes\RequestBody;
use Doctrine\Persistence\ManagerRegistry;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RegisterController extends AbstractController
{
    #[Route('/api/v1/register', name: 'app_reg', methods: ['POST'], stateless: false)]
    #[RequestBody(attachables: [new Model(type: UserRegisterRequest::class)])] 
    public function login(UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine, Request $request)
    {
        $resp = json_decode($request->getContent(), true);


        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setUsername($resp["username"]);
        $user->setEmail($resp["email"]);
        $user->setRoles(['ROLE_USER']);
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $resp["password"]
        );
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);

        $entityManager->flush();

        return $this->json([
            'user' => "successful",
        ]);
    }
}
