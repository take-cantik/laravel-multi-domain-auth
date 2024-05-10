<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use http\Client\Request;
use http\Client\Response;

class SignUpController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $email = $request->email;
        $password = $request->password;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        User::query()->insert([
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        $loggedIn = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        if (!$loggedIn) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'message' => 'User created successfully',
        ], 201);
    }
}
