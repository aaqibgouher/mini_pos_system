<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    public static function get_user_id_by_token($token){
        $user_token = UserToken::where('token', $token)->first();
        return $user_token ? $user_token->user_id : false;
    }
}
