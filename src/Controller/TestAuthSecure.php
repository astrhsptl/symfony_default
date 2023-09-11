<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestAuthSecure extends AbstractController
{
    #[Route('/api/v1/test/secure/first', name: 'secure', methods: ["POST"])]
    public function secure(): JsonResponse
    {
        return $this->json([
            'message' => 'You are in secure area!',
        ]);
    }

    #[Route('/api/v1/test/public/first', name: 'public', methods: ["POST"])]
    public function public(): JsonResponse
    {
        return $this->json([
            'message' => 'This is public area!',
        ]);
    }
}