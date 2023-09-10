<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
 
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function showAll(): View
    {
        $users = User::latest()->get();
        return view("dashboard",compact('users'));
    }

    
}