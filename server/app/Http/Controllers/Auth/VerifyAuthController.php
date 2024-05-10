<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use http\Client\Response;

class VerifyAuthController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $loggedIn = Auth::check();

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
