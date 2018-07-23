<?php

namespace App\Http\Controllers\Context;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, View;

class ProfileController extends Controller
{
    public function getContextUser()
    {
    	$user = Auth::user();


    	return View::make('context.profile', compact('user'));
    }
}
