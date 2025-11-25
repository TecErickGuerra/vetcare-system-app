<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            $stats = [
                'total_users' => User::count(),
                'total_pets' => Pet::count(),
                'admin_count' => User::where('role_id', 1)->count(),
            ];
            return view('dashboard.admin', compact('stats'));
        } elseif ($user->isStaff()) {
            return view('dashboard.staff');
        } else {
            $petCount = Pet::where('owner_id', $user->id)->count();
            return view('dashboard.client', compact('petCount'));
        }
    }
}