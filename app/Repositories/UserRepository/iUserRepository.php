<?php

namespace app\Repositories\UserRepository;

interface iUserRepository{
    public function register($request);
    public function updateUser($id, $request);
    public function deleteUser($id);
    public function logIn($request);
}
