<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

class UserController extends Controller
{
    public function index()
    {
    	return View::make('user.index');
    }
}
