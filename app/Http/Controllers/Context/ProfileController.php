<?php

namespace App\Http\Controllers\Context;

use Auth, View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Context\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function get()
    {
    	$user = Auth::user();

    	return View::make('context.profile', compact('user'));
    }


    public function update(UpdateProfileRequest $request)
    {
    	$inputs = $request->validated();

    	$user = Auth::user();

    	$user->update($inputs);

    	return redirect()->route('context.profile');
    }
}
