<?php

namespace App\Repositories\User;

use App\Core\Usecases\User\IUserMapper;
use App\Core\Usecases\User\IUserRepository;
use App\Core\Usecases\User\UserDto;
use App\Core\Usecases\User\UserInputDto;

class UserRepository implements IUserRepository
{
    private IUserMapper $userMapper;

    /**
     * @param IUserMapper $userMapper
     */
    public function __construct(IUserMapper $userMapper)
    {
        $this->userMapper = $userMapper;
    }

    public function createUser(UserInputDto $userInputDto): ?UserDto
    {
        $userEntity= $this->userMapper->userEntityFromUserInputDao($userInputDto);
        $userEntity->save();
        return $this->userMapper->userDaoFromUserEntity($userEntity);
    }
}
