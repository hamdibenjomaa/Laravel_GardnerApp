<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        // Handle redirection based on user roles
        if ($user->role === 'admin') {
            return redirect()->route('backOffice.providers.home'); // Change this to your admin route
        }

        return redirect()->route('home'); // Change this to your default user route
    }
}
