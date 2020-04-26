<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PasswordToken extends Model
{
    protected $fillable = ['token'];

    public static function getUserForToken($token) {
        return self::where('token', $token)->first()->user;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
