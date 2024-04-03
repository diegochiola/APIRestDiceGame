<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Workbench\App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //definir funciones

    public function registerUser(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'name' => 'unique:users',
            'nickname' => 'nullable|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|alpha_num'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //si son validos
        $input = $request->all();
        $input['password'] = bcrypt($input['password']); //cifrar la password con bcrypt
        $user = User::create($input);
        //asignar el rol
        $this->assignPlayerRoleToUser($user);
         //asignar token 
        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['id'] = $user->id;
        $success['name'] = $user->name;
        $success['role'] = 'player';
    
        return response()->json($user, 201);
    }

    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'nickname' => $nickname,
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
    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());
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
            $success['token'] = $user->createToken('authToken')->accessToken;
            $success['name'] = $user->name;
            return response()->json([$success, 'You are logged in!'], 200);
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
