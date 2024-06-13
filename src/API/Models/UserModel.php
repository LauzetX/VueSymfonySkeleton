<?php

namespace App\API\Models;

use App\Entity\User;
use App\API\Interfaces\ModelFormInterface;

class UserModel implements ModelFormInterface
{
    public ?int $id;

    public ?string $email;
    private ?array $roles = ['ROLE_USER'];

    private ?string $password;

    public ?string $name;

    /**
     * @param $id
     * @param $email
     * @param array $roles
     * @param $password
     * @param $name
     */
    public function __construct(
        ?int $id = null,
        ?string $email = null,
        ?array $roles = [],
        ?string $password = null,
        ?string $name = null,
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->roles = $roles;
        $this->password = $password;
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?array $roles): void
    {
        $this->roles = $roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}