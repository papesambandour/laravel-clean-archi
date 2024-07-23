<?php

namespace App\Core\Usecases\User;

use Illuminate\Http\JsonResponse;

interface IUserPresenter
{
   public function present(UserOutputDto $userOutputDto):void;
   public function getViewModel( ):JsonResponse;
}
