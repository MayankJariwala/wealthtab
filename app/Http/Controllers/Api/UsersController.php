<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

//TODO: Status code can be use from constants file
class UsersController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return ResponseFactory|JsonResponse|Response|object
     * @throws \Exception
     */
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
        $login_response = $this->userRepository->validateCredentials($email, $password);
        return response($login_response, 200, [
            'Authorization' => 'Bearer ' . $login_response['token'],
            'Accept' => 'application/json',
        ]);

    }
}
