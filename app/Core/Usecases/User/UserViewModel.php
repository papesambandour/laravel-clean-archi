<?php

namespace App\Core\Usecases\User;

class UserViewModel implements IUserViewModel
{
  public ?UserDto $data =null;
  public int $httpCode = 200 ;
  public bool $asError = false ;
  public array $errorMessages = [] ;
}
