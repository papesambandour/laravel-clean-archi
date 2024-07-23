<?php

namespace App\Core\Usecases\User;

interface ICreateUserUseCase
{
   public  function  execute(UserInputDto $caseInput,IUserPresenter $userPresenter): void;
}
