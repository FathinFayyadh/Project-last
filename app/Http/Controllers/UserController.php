<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profil()
    {
        $user = User::find(Auth::user()->id);
        $userId = Auth::id();
        return view('dashboard.user.profil', compact('user', 'userId'));
    }
}
