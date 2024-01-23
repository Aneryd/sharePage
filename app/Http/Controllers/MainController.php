<?php

namespace App\Http\Controllers;

use App\Actions\MainAction;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(MainAction $action){
        return $action->execute();
    }
}
