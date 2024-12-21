<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface{
    public function getAllUser(){
        return User::all();
    }

    public function getUserById(int $id){
        return User::where('id', $id);
    }

    public function register(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return $user;
    }

    public function editUser(int $id, array $data){
        $user = User::find($id);
        $user->update([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function deleteUser(int $id){
        return User::find($id)->delete();
    }

    public function login(array $data)
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return false;
        }
        return Auth::user();
    }
}
