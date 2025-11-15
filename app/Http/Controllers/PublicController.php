<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Message; // <-- 1. IMPORT MODEL MESSAGE
use Illuminate\Http\RedirectResponse; // <-- 2. IMPORT RedirectResponse

class PublicController extends Controller
{
    /**
     * Menampilkan halaman Home publik.
     */
    public function home(): View
    {
        $services = Service::latest()->get();
        $projects = Project::latest()->get();
        $settings = Setting::pluck('value', 'key')->all();

        return view('public.home', compact('services', 'projects', 'settings'));
    }

    /**
     * Simpan pesan baru dari formulir kontak publik.
     */
    public function storeContact(Request $request): RedirectResponse // <-- 3. TAMBAHKAN METHOD BARU INI
    {
        // 4. Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 5. Simpan ke database
        Message::create($validated);

        // 6. Redirect kembali ke halaman home (bagian #contact) dengan pesan sukses
        return redirect(url('/#contact'))->with('success', 'Pesan Anda telah terkirim! Terima kasih.');
    }
}
