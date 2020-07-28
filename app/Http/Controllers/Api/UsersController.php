<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $validation_response = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:8"
        ]);
        if ($validation_response->fails()) {
            // Can also do this with Resource
            return response()->json([
                "code" => 400,
                "message" => $validation_response->errors()->first()
            ])->setStatusCode(400);
        }
        $email = $request["email"];
        $password = $request["password"];
        try {
            $login_response = $this->userRepository->validateCredentials($email, $password);
            return response()->json($login_response)->setStatusCode(200);
        } catch (\Exception $e) {
            // Can also do this with Resource
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage()
            ])->setStatusCode(500);

        }
    }
}
