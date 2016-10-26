<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user->load('tasks');
        return view('profile.index', ['user' => $user, 'tasks' => $user->tasks]);
    }

    public function changePassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return 0;
        }
        $newPass = str_random(8);

        $user->password = Hash::make($newPass);
        $user->save();

        Mail::send('emails.reminder', ['user' => $user, 'pass' => $newPass], function ($m) use ($user) {
            $m->from('artilligence@mail.ru', 'Laravel Tech Task');
            $m->to($user->email, $user->name)->subject('Change Password');
        });

        return 1;
    }
}