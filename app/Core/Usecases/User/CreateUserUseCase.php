<?php

namespace App\Core\Usecases\User;

class CreateUserUseCase implements ICreateUserUseCase
{
    public IUserRepository $userRepository;
    public function __construct(IUserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function execute(UserInputDto $caseInput, IUserPresenter $userPresenter): void
    {
        $userDto= $this->userRepository->createUser($caseInput);
        $userOutputDto =  new UserOutputDto();
        if(!empty($userDto) ){
          $userOutputDto->userDto = $userDto;
        }else{
            $userOutputDto->errors = [
                "user"=>['Imposible de créer le user']
            ] ;
        }
        $userPresenter->present($userOutputDto);
    }
}
