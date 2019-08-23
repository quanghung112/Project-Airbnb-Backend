<?php


namespace App\Services\Impl;


use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    protected $userRepositoryInterface;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function findById($id)
    {
        $user = $this->userRepositoryInterface->findById($id);
        return $user;
    }
    public function update($request, $id)
    {
        $oldpost = $this->userRepositoryInterface->findById($id);
        $this->userRepositoryInterface->update($request,$oldpost);
    }

}