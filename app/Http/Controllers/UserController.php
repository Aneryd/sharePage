<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Encryption\Encrypter;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service){
        $this->service = $service;
    }

    public function secret(){
        return response()->json([
            "secret" => $this->service->secret()
        ]);
    }

    public function show($id){
        return view("profile", $this->service->show($id));
    }
}
