<?php

namespace App\Services;

use App\Models\User;

class UserService{
    public function secret(){
        return env("APP_URL")."/profile/".auth()->user()->id."?secret=".encrypt(auth()->user()->id);
    }

    public function show($id){
        return ["user" => User::find($id)];
    }
}