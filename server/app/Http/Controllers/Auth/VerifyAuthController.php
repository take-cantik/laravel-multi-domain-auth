<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VerifyAuthController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $loggedIn = Auth::guard('default')->check();

        if (!$loggedIn) {
            return response()->json([
                'message' => 'User is not authenticated',
            ], 401);
        }

        return response()->json([
            'message' => 'User is authenticated',
        ], 200);
    }
}
