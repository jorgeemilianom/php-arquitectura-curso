<?php
declare(strict_types=1);

namespace Core\Modules\Usersv1\Domain;

final class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $token;
    private array $Context;

    public function __construct() {
        $this->id = 1;
        $this->name = 'Pablo';
        $this->email = 'test@test.com';
        $this->token = '123456';
        $this->Context = [];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getContext(): array
    {
        return $this->Context;
    }

}