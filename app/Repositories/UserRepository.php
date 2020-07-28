<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRepository
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param string $email User Email
     * @param string $password User Password
     * @return array
     * @throws Exception
     */
    public function validateCredentials(string $email, string $password)
    {
        $isValid = Auth::attempt([
            "email" => $email,
            "password" => $password
        ]);
        if (!$isValid) {
            abort(response()->json(['message' => 'Email or Password did not matched.'], 401));
        }
        $user = auth()->user();
        $token = $this->generateApiToken();
        $user->api_token = hash('sha256', $token);
        $user->save();
        //TODO: Use Model Transformer
        return [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "token" => $token,
            "timestamp" => date("Y-m-d h:i:s")
        ];
    }

    // Create a random api token which is created by system
    private function generateApiToken()
    {
        $token = Str::random(60);
        return $token;
    }
}
