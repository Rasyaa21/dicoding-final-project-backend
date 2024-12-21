<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use UserRepositoryInterface;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function create(CreateUserRequest $req){
        try{
            $data = $req->validated();
            $user = $this->userRepository->createUser($data);
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'data' => $data
            ]);
        } catch (Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit(){

    }

    public function delete(){

    }

    public function getAllUser(){

    }

    public function getUserById(){

    }
}
