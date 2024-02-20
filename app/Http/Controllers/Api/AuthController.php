<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function signup(Request $request)
    {


        // return response()->json($request->all(), 200);
        $data = $request->all();
        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => bcrypt($data['password']),
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json($data, 200);
       
    }
    public function login(Request $request)
    {
        // $credentials = $request->validated();
        // if (!Auth::attempt($credentials)) {
        //     return response([
        //         'message' => 'Provided email or password is incorrect'
        //     ], 422);
        // }

        // /** @var \App\Models\User $user */
        // $user = Auth::user();
        // $token = $user->createToken('main')->plainTextToken;
        // return response(compact('user', 'token'));
        //////////////////////////////////
        // $credentils = $request->validated();
        // return response()->json($request->password);



        
        $password = '$2y$12$mB6o52.JT2YCicZDPLyNxuL6CgwGXlw3rZsa4xrBbHiqpeD7wIsCq';
        // $email = $request->email;
        // $credentials = [
        //     'email' => '<EMAIL>',
        //     'password' => $password,
        // ];
        // $dataAuth = [
        //     'email' => $request->email,
        //     'password' => $password
        // ];
        // return response()->json($password);
        if(!Auth::attempt(['email' => $request->email, 'password' =>$password]))
        {
            return response([
                'message' => 'Provided Email Address Or Password is Incorrect'
            ], 422);
        }
        // f(!Auth::attempt($dataAuth)) {
        //     return response([
        //         'message' => 'Provided Email Address Or Password is Incorrect'
        //     ], 422);
        // }
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json($data, 200);

        // return Responsejson([
        //     'users' => $user,
        //     'Token' => $token
        // ]);
        // return response(compact('user', 'token'));
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }
}
