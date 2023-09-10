<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function edit(string $id): View
    {
        return view('user.edit', [
            'user' => User::findOrFail($id)
        ]);
    }


    public function update(Request $request)
    {
        $id = $request->id;
        if($id == null)  return redirect()->back();

        User::findOrFail($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    

        return redirect()->back();
    }

    public function showAll(): View
    {
        $users = User::latest()->get();
        return view("dashboard",compact('users'));
    }
  
    public function delete(string $id)
    {   

        User::findOrFail($id)->delete();
        return redirect()->route('dashboard');
    }

}