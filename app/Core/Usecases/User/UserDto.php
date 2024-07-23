<?php

namespace App\Core\Usecases\User;

class UserDto
{
    public string $name;
    public string $email;
    public string $phone;
    public bool $isActive;
    public string $createdAt;
    public string $updatedAt;
}
