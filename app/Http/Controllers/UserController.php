<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        //如果不是管理者，無法修改別人的資料
        $loggedInUser = Auth::user();
        if($loggedInUser->role != "admin" && $loggedInUser->id != $id) return redirect()->back();



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

         //如果不是管理者，無法刪除別人的資料
        $loggedInUser = Auth::user();
        if($loggedInUser->role != "admin" && $loggedInUser->id != $id) redirect()->route('dashboard');


        User::findOrFail($id)->delete();
        return redirect()->route('dashboard');
    }

}