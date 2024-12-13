<?php

interface UserRepositoryInterface{
    public function getAllUser();
    public function getUserById(int $id);
    public function createUser(array $data);
    public function editUser(int $id, array $data);
    public function deleteUser(int $id);
}

