<?php

namespace App\Core\Usecases\User;

use App\Models\UserEntity;

interface IUserMapper
{
   public function userInputFromRequest(array $input): UserInputDto;
   public function userEntityFromUserInputDao(UserInputDto $userInputDto): UserEntity;
   public function userDaoFromUserEntity(UserEntity $userEntity): UserDto;
}
