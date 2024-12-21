<?php

namespace App\Interfaces;

interface UserRepositoryInterface{
    public function getAllUser();
    public function getUserById(int $id);
    public function register(array $data);
    public function login(array $data);
    public function editUser(int $id, array $data);
    public function deleteUser(int $id);
}

