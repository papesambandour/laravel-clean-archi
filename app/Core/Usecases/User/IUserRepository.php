<?php

namespace App\Core\Usecases\User;

interface IUserRepository
{
   public function createUser(UserInputDto $userInputDto): ?UserDto;
}
