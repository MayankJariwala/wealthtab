<?php


namespace App\Service;


use App\Model\FileModel;

class FileOpsService
{


    public function __construct()
    {

    }

    public function fetchFileById($id, $user)
    {
        $file_model = FileModel::where('id', $id)->first();
        if ($file_model->access_level !== $user->access_level)
            abort(response()->json(['message' => 'Forbidden.'], 403));
        return $file_model;
    }
}
