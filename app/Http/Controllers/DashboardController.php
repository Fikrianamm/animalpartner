<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        switch ($role) {
            case 'pemilikhewan':
                return view('dashboard.user');
            
            case 'dokterhewan':
                return view('dashboard.dokter');
            
            case 'admin':
                return view('dashboard.admin');
            
            default:
                # code...
                break;
        }
    }
}
