<?php

namespace App\API\Requests;

use Symfony\Component\Validator\Constraints as Assert;

class LoginRequest
{
    #[Assert\Type('string')]
    #[Assert\NotBlank()]
    private string $email;

    #[Assert\Type('string')]
    #[Assert\NotBlank()]
    private string $password;

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}