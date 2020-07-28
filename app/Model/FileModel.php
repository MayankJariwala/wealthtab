<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    //
    protected $table = "file_models";
    protected $primaryKey = "id";
    protected $fillable = [
        'access_level',
        'file_name',
        'file_link'
    ];

    protected $hidden = ['access_level'];

    public function user_permissions()
    {
        return $this->hasOne("App\Model\UserLevelModel", "access_level", "id");
    }
}
