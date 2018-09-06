<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KickoutController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->kickOut();

        return back();
    }
}
