<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::latest()->get();

        return view('admin.services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_class' => 'nullable|string|max:100',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Jasa baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        // (Tidak kita gunakan)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View // <-- 1. UPDATE METHOD INI
    {
        // Laravel otomatis menemukan 'Service' berdasarkan ID dari URL (Route Model Binding)
        // Kirim data service yang ditemukan ke view 'edit'
        return view('admin.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse // <-- 2. UPDATE METHOD INI
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_class' => 'nullable|string|max:100',
        ]);

        // Update data service yang ada
        $service->update($validated);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('services.index')->with('success', 'Jasa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse // <-- 3. UPDATE METHOD INI
    {
        // Hapus data service dari database
        $service->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('services.index')->with('success', 'Jasa berhasil dihapus!');
    }
}
