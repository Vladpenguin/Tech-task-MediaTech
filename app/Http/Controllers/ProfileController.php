<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user->load('tasks');
        return view('profile.index', ['user' => $user, 'tasks' => $user->tasks]);
    }
}