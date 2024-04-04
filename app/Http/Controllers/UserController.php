<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Workbench\App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //definir funciones

    public function register(StoreUserRequest $request)
    { 
    //validaciones realizadas por el StoreUserRequest
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
    
        $this->assignPlayerRoleToUser($user);
    
        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['id'] = $user->id;
        $success['name'] = $user->name;
        $success['role'] = 'player';
    
        return response()->json($success, 201);
    }
    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'nickname' =>$request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $user;
    }

    public function assignRoleToUser($user)
    {
        $role = Role::findByName('player');
        $user->assignRole($role);

    }
    public function update(UpdateUserRequest $request, $id){
        $userData = $request->validated();
        $user = User::findOrFail($id);
        $user->update($userData);

        return response()->json($user, 200);
       }
    
       public function updateName(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->id != $id) {
            return response()->json(['error' => 'You are not authorized for this action'], 403);
        }
        $this->validate($request, [
            'name' => 'required',
            'nickname' => 'required'
        ]);
        $user->name = $request->input('name');
        $user->nickname = $request->input('nickname');
        $user->save();
        return response()->json(['message' => 'Name updated successfully!', 'user' => $user], 200);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['token' => $token, 'message' => 'You are logged in!'], 200);
        } else {
            return response()->json(['error' => 'Login error. Email or password error.'], 401);
        }
     }
     public function logout()
     {
         $user = Auth::user();
    
         if ($user) {
    
             $user->tokens->each->revoke();
    
             return response()->json('Log out successfully!', 200);
         } else {
             return response()->json('You are not logged in.', 401);
         }
     }

    //calculos para ranking en game controller


}
