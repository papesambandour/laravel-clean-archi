<?php

namespace App\Http\Controllers;

use App\Core\Usecases\User\ICreateUserUseCase;
use App\Core\Usecases\User\IUserMapper;
use App\Core\Usecases\User\IUserPresenter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    public IUserPresenter $userPresenter;
    public ICreateUserUseCase $userUseCase;
    public IUserMapper $userMapper;

    /**
     * @param IUserPresenter $userPresenter
     * @param ICreateUserUseCase $userUseCase
     * @param IUserMapper $userMapper
     */
    public function __construct(IUserPresenter $userPresenter, ICreateUserUseCase $userUseCase, IUserMapper $userMapper)
    {
        $this->userPresenter = $userPresenter;
        $this->userUseCase = $userUseCase;
        $this->userMapper = $userMapper;
    }

    public function createUser(Request $request): JsonResponse
  {
      $userInputDto = $this->userMapper->userInputFromRequest($request->only(['name', 'email', 'password','phone']));
      $this->userUseCase->execute($userInputDto,$this->userPresenter);
      return $this->userPresenter->getViewModel();
  }
}
