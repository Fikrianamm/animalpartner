<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Animals;
use App\Models\Articles;
use App\Models\ChMessage;
use App\Models\Reminders;
use App\Models\Categories;
use App\Models\Forum_posts;
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
                    'chats' => ChMessage::where('to_id', $id)->latest()->get(),
                    'user' => auth()->user(),

                ]);
            
            case 'dokter':
                return view('dashboard.dokter',[
                    'user' => auth()->user(),
                    'posts' => Forum_posts::latest()->take(10)->get(),
                    'articles' => Articles::where('user_id', $id)->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
                    'chats' => ChMessage::where('to_id', $id)->latest()->get(),
                    'categories' => Categories::all(),
                ]);
            
            case 'admin':
                return view('dashboard.admin',[
                    'user' => auth()->user(),
                    'articles' => Articles::where('is_approved', false)->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
                    'users' => User::whereNot('role','admin')->get(),
                    
                ]);
            
            default:
                # code...
                break;
        }
    }
}
