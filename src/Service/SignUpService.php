<?php

namespace App\Service;

use App\Model\UserRequest;
use App\Repository\UserRepository;


class SignUpService {

    public function __construct(
    private UserRepository $userRep) {
    }

    function getCategories(UserRequest $signUpRequest): BookCategoryListResponse {
        return $signUpRequest->getEmail();
    }
    
}