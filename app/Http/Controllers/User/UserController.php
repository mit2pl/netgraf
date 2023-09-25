<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Models\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;

class UserController
{
    public function index()
    {
        return view("user.index");
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'user_status' => '0',
        ]);
        ApiResponse::create([
            'code' => '200',
            'type' => 'unknown',
            'message' => 'Create user with name: '. $request->get('username'),
        ]);
        return redirect()->route('user.index')->with('success', "User was added");
    }

    public function destroy(string $username)
    {
        $user = User::where('username', $username);
        if (!empty($user))
        {
            $user->delete();
            ApiResponse::create([
                "code" => "20",
                'type' => "unknown",
                'message' => "uer was delete",
            ]);
            return redirect()->route("index")->with('success', 'User was deleted');
        }else {
            ApiResponse::create([
                'code' => '404',
                'type' => 'unknown',
                'message' => 'user not found'
            ]);
            return redirect()->route("index")->with('errors', 'such user does not exist');
        }
    }
    public function show(string $username)
    {
        $get_user = User::where('username', $username)->first();
        return view("user.show", ['user' => $get_user]);
    }

    public function update(UserUpdateRequest $request)
    {
        $user_value = User::where('id', $request->get('id'))->first();
        if(!$request->get('username') ==  $user_value['username']) {
            $update['username'] = $request->get('username');
        }
        $update = [
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
        ];
        if($request->get('password')) {
            $update['password'] = Hash::make($request->get('password'));
        }
        User::where('id', $request->get('id'))->update($update);
        ApiResponse::create([
            'code' => '200',
            'type' => 'fawe',
            'message' => 'faswefaasda',
        ]);
        return redirect()->route("user.show", $request->get('username'))->with('success', 'User was update');
    }
}
