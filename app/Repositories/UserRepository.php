<?php

use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    public function getAllUser(){
        return User::all();
    }

    public function getUserById(int $id){
        return User::where('id', $id);
    }

    public function createUser(array $data){

    }

    public function editUser(int $id, array $data){

    }

    public function deleteUser(int $id){

    }
}
