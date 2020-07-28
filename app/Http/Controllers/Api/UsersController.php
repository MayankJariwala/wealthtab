<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

//TODO: Status code can be use from constants file
class UsersController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // can also place this code in the user service
    public function logout()
    {
        $user = \request()->user();
        $user->api_token = null;
        $user->save();
        return Response::json([
            "message" => "Logged out"
        ], 200);
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
            return Response::json([
                "code" => 400,
                "message" => $validation_response->errors()->first()
            ], 400);
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
