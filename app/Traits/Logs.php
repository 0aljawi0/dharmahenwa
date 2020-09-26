<?php
namespace App\Traits;

use App\Models\UserLog;

trait Logs {

    public static function add($name)
    {
        $user_log = new UserLog;
        $user_log->name = $name;
        $user_log->save();
    }

}
