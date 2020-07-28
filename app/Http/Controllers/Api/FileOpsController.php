<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\FileOpsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/**
 * Class FileOpsController This controller holds the operation perform on
 * Files
 * @author Mayank Jariwala mayankjariwala1994@gmail.com
 * @package App\Http\Controllers\Api
 */
class FileOpsController extends Controller
{

    private $file_ops_service;

    public function __construct(FileOpsService $file_ops_service)
    {
        $this->file_ops_service = $file_ops_service;
    }

    /**
     * Function allow user to fetch all files information based on the user access level
     *
     * @return JsonResponse
     * @author Mayank Jariwala mayankjariwala1994@gmail.com
     */
    public function fetchUserFiles()
    {
        // get all files at user level
        return Response::json(Auth::user()->file_access, 200);
    }

    /**
     * Function allow user to fetch the file information based on the provided id
     * @param $fileId "uuid of file"
     *
     * @return JsonResponse
     * @author Mayank Jariwala mayankjariwala1994@gmail.com
     */
    public function fileById($fileId)
    {
        $user = request()->user();
        $file = $this->file_ops_service->fetchFileById($fileId, $user);
        return Response::json($file);
    }
}
