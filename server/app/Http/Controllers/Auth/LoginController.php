<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function __invoke(FormRequest $request): JsonResponse
    {
        $email = $request->email;
        $password = $request->password;

        $loggedIn = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ], remember: true);

        if (!$loggedIn) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'User logged in successfully',
        ], 201);
    }
}
