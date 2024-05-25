<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::find(Auth::user()->id);
        $userId = Auth::id();
        return view('dashboard.dashboard', compact('user', 'userId'));
    }
   
}
