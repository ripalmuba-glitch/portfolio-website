<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Tampilkan form pengaturan.
     */
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Simpan data pengaturan.
     */
    public function update(Request $request): RedirectResponse
    {
        // 1. Tentukan aturan validasi
        $rules = [
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=500,min_height=500',

            'stat_1_number' => 'required|string|max:50',
            'stat_1_text' => 'required|string|max:255',
            'stat_2_number' => 'required|string|max:50',
            'stat_2_text' => 'required|string|max:255',
            'stat_3_number' => 'required|string|max:50',
            'stat_3_text' => 'required|string|max:255',

            'about_text' => 'nullable|string',
            'tech_skills' => 'nullable|string|max:1000',

            // Aturan Validasi untuk Link Sosial (BARU)
            // 'url' memastikan itu adalah link yang valid, 'nullable' berarti boleh kosong
            'social_whatsapp' => 'nullable|string|max:255', // WA bisa jadi nomor, jadi 'string'
            'social_facebook' => 'nullable|url|max:255',
            'social_tiktok' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_github' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
        ];

        $validatedData = $request->validate($rules);

        // 2. Handle Upload Foto Hero
        if ($request->hasFile('hero_photo')) {
            $oldPhotoPath = Setting::where('key', 'hero_photo_path')->value('value');
            $path = $request->file('hero_photo')->store('settings/hero', 'public');
            Setting::updateOrCreate(
                ['key' => 'hero_photo_path'],
                ['value' => $path]
            );
            if ($oldPhotoPath && Storage::disk('public')->exists($oldPhotoPath)) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
            unset($validatedData['hero_photo']);
        }

        // 3. Simpan semua data teks
        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? ''] // Simpan value (atau string kosong jika null)
            );
        }

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil disimpan!');
    }
}
