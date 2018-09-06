<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ActiveUsersController extends Controller
{
    public function index()
    {
        return view('active', [
            'users' => User::where('last_active_at', '>=', now()->subMinute())->get(),
        ]);
    }
}
