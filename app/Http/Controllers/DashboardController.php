<?php

namespace App\Http\Controllers;

use App\Models\Animals;
use App\Models\Reminders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $species = [
            'Anjing',
            'Kucing',
            'Burung',
            'Kelinci',
            'Ayam',
            'Sapi',
            'Kuda',
        ];

        $types = [
            'Perawatan Umum',
            'Vaksin',
            'Pemeriksaan Rutin',
            'Mandi',
            'Obat',
            'Grooming',
        ];

        $role = auth()->user()->role;
        $id = auth()->user()->id; 
        switch ($role) {
            case 'pemilikhewan':
                return view('dashboard.default',[
                    'animals' => Animals::where('user_id', $id)->get(),
                    'reminders' => Reminders::where('user_id', $id)->get(),
                    'species' => $species,
                    'types' => $types,
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
