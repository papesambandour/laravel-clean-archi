<?php

namespace App\Core\Usecases\User;

use App\Models\UserEntity;
use Illuminate\Support\Facades\Hash;

class UserMapper implements IUserMapper
{

    public function userInputFromRequest(array $input): UserInputDto
    {
        $userInput = new UserInputDto();
        $userInput->name= @$input['name'];
        $userInput->email= @$input['email'];
        $userInput->phone= @$input['phone'];
        $userInput->password= @$input['password'];
        return $userInput;
    }

    public function userEntityFromUserInputDao(UserInputDto $userInputDto): UserEntity
    {
        $userEntity= new UserEntity();
        $userEntity->phone_client = $userInputDto->phone ;
        $userEntity->email_client = $userInputDto->email ;
        $userEntity->name_client = $userInputDto->name ;
        $userEntity->password_client = Hash::make($userInputDto->password) ;
        $userEntity->created_at = now() ;
        $userEntity->created_at = now() ;
        $userEntity->is_active_client = true ;
        return $userEntity;
    }

    public function userDaoFromUserEntity(UserEntity $userEntity): UserDto
    {
        $userDto = new UserDto();
        $userDto->phone = $userEntity->phone_client ;
        $userDto->email = $userEntity->email_client ;
        $userDto->name = $userEntity->name_client ;
        $userDto->createdAt = $userEntity->created_at ;
        $userDto->updatedAt = $userEntity->updated_at;
        $userDto->isActive = $userEntity->is_active_client ;
        return $userDto;
    }
}
