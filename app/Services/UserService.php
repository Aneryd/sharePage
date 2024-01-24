<?php

namespace App\Services;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserService{
    public function secret(){
        // return env("APP_URL")."/profile/".auth()->user()->id."?secret=".encrypt(auth()->user()->id);
        return env("APP_URL")."/profile/".auth()->user()->id."?secret=".JWT::encode(["id" => auth()->user()->id], 
            env("APP_KEY"), "HS256");
    }

    public function show($id){
        return ["user" => User::find($id)];
    }
}