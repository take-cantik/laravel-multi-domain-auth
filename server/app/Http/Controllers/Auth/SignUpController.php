<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(FormRequest $request): JsonResponse
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
        ], remember: true);

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
