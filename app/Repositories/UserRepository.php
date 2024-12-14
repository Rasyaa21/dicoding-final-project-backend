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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        return $user;
    }

    public function editUser(int $id, array $data){
        $user = User::find($id);
        $user->update([
            'name' => $data['name'],
            'password' => $data['password'],
        ]);

        return $user;
    }

    public function deleteUser(int $id){
        return User::find($id)->delete();
    }
}
