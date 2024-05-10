<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Client\Request;
use http\Client\Response;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $passwordMatch = password_verify($password, $user->password);

        if (!$passwordMatch) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'message' => 'User logged in successfully',
        ], 201);
    }
}
