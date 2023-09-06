<?php

namespace App\Http\Controllers\API\Authentication;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    //

    public function register(RegisterRequest $request): JsonResponse
    {        
        $user = User::create($request->validated());
        $client = Client::create(
            [
                'user_id' => $user->id,
                'name' => $request->input('name'),
            ]
        );

        $success['token'] =  $user->createToken('user-token')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', $request->input('email'))->first();
            
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $success['role'] = $user->role->name;

            return $this->sendResponse($success, 'User register successfully.');
        }
        else{ 
            
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

        } 
        
    }
    
}
