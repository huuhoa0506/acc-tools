<?php

namespace App\Http\Controllers\User;

use View;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::paginate();
    	return View::make('user.index', compact('users'));
    }
}
