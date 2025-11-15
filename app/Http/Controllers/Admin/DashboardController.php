<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project; // <-- 1. Import Model
use App\Models\Service; // <-- 2. Import Model
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index(): View
    {
        // 3. Ambil data untuk "Widget"
        $totalProjects = Project::count();
        $totalServices = Service::count();

        // 4. Ambil data untuk "Tabel"
        $recentProjects = Project::orderBy('created_at', 'desc')->take(5)->get();

        // 5. Kirim data ke view
        return view('dashboard', [
            'totalProjects' => $totalProjects,
            'totalServices' => $totalServices,
            'recentProjects' => $recentProjects,
        ]);
    }
}
