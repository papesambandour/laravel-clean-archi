<?php

namespace App\Presenter\User;

use App\Core\Usecases\User\IUserPresenter;
use App\Core\Usecases\User\UserOutputDto;
use App\Core\Usecases\User\UserViewModel;
use Illuminate\Http\JsonResponse;

class UserJsonPresenter implements IUserPresenter
{
   private UserOutputDto $userOutputDto;
    public function present(UserOutputDto $userOutputDto): void
    {
        $this->userOutputDto = $userOutputDto;
    }

    public function getViewModel(): JsonResponse
    {
        $viewModel = new UserViewModel();

        if(count($this->userOutputDto->errors)){
            $viewModel->httpCode = 400;
            $viewModel->asError = true;
            $viewModel->data = null;
            $viewModel->errorMessages = $this->userOutputDto->errors;
        }else{
         $viewModel->httpCode = 201;
         $viewModel->asError = false;
         $viewModel->data = $this->userOutputDto->userDto;
        }

        return response()->json($viewModel);
    }
}
