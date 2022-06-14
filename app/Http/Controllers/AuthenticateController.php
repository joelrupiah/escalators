<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Image;

class AuthenticateController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Register request complete',
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
            
        }

        return $user->createToken('Auth Token')->accessToken;
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    public function updateAdminData(Request $request)
    {
        // $request->validate([
        //     'password' => ['required', 'min:6', 'confirmed']
        // ]);

        $user = Auth()->user();
        // return $user;

        $slug = slugify($request->title);
        
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->dob = $request->dob;

        if ($request->avatar != $user->avatar) {
            $file = explode(';', $request->avatar);
            $file = explode('/', $file[0]);
            $file_ex = end($file);
            $file_name = $slug . '.' . $file_ex;
            $user->avatar = $file_name;
            Image::make($request->avatar)->resize(800, 600)->save(public_path('/uploads/user/').$file_name);
        }

        $user->save();

        return response()->json(['success' => true], 200);
    }
}
