<?php

namespace App\Http\Controllers;

use App\Models\Animals;
use App\Models\Reminders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $role = auth()->user()->role;
        $id = auth()->user()->id; 
        switch ($role) {
            case 'pemilikhewan':
                return view('dashboard.default',[
                    'animals' => Animals::where('user_id', $id)->get(),
                    'reminders' => Reminders::where('user_id', $id)->get(),
                ]);
            
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
