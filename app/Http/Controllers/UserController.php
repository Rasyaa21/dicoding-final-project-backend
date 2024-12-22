<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Exception;
use UserRepository;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function register(CreateUserRequest $req){
        try{
            $data = $req->validated();
            $user = $this->userRepository->register($data);
            $token = $user->createToken('token')->plainTextToken;
            return new ApiResponse(201, [new UserResource($user), 'token' => $token]);
        } catch (Exception $e){
            return new ApiResponse(500, [], 'server error', $e->getMessage());
        }
    }

    //di end point tambahin user id nya nanti
    public function edit(UpdateUserRequest $req){
        try {
            $data = $req->validated();
            $user = User::findOrFail(Auth::id());
            $updateUser = $this->userRepository->editUser($user, $data);

            return response()->json([
                'message' => 'successfully updated',
                'data' => $updateUser
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function login(LoginRequest $req){
        try{
            $data = $req->validated();
            $user = $this->userRepository->login($data);
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'data' => $user
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(){
        try{
            $user = Auth::user();
            $this->userRepository->deleteUser($user->id);
            $user->tokens->delete();
            return response()->json([
                'message' => 'user successfully deleted'
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllUser(){
        try{
            $users = User::all();
            return response()->json([
                'data' => $users
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getUserById(int $user_id){
        try{
            $user = User::find($user_id);
            if (!$user){
                return response()->json([
                    'message' => 'user not found'
                ], 401);
            }
            return response()->json([
                'data' => $user
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
