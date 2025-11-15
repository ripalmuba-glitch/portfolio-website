<x-admin-layout>
    <x-slot name="header">
        Pengaturan Situs (Site Settings)
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h3 class="admin-section-title">Hero Section</h3>
            <div class="space-y-4 mb-8">
                <div>
                    <label for="hero_title" class="admin-label">Hero Title</label>
                    <input type="text" name="hero_title" id="hero_title"
                           value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                           class="admin-input" placeholder="Cth: [Nama Anda].">
                    @error('hero_title')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="hero_subtitle" class="admin-label">Hero Subtitle (Typed.js)</label>
                    <input type="text" name="hero_subtitle" id="hero_subtitle"
                           value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}"
                           class="admin-input" placeholder="Cth: Saya seorang Web Developer">
                    @error('hero_subtitle')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="hero_description" class="admin-label">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="3"
                              class="admin-textarea"
                              placeholder="Deskripsi singkat tentang diri Anda..."
                    >{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
                    @error('hero_description')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="hero_photo" class="admin-label">Ganti Foto Hero (Maks 2MB)</label>
                    <input type="file" name="hero_photo" id="hero_photo" class="admin-file-input">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti foto.</p>
                    @error('hero_photo')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                    @if(isset($settings['hero_photo_path']))
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($settings['hero_photo_path']) }}" alt="Hero Photo" class="w-32 h-32 object-cover rounded-lg shadow-md">
                        </div>
                    @else
                         <div class="mt-4">
                            <p class="text-sm text-gray-600 mb-2">Foto default (dari `public/images/my-photo.png`):</p>
                            <img src="{{ asset('images/my-photo.png') }}" alt="Default Hero Photo" class="w-32 h-32 object-cover rounded-lg shadow-md">
                        </div>
                    @endif
                </div>
            </div>

            <h3 class="admin-section-title">Stats Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-8">
                <div>
                    <label for="stat_1_number" class="admin-label">Stat 1 (Angka)</label>
                    <input type="text" name="stat_1_number" id="stat_1_number"
                           value="{{ old('stat_1_number', $settings['stat_1_number'] ?? '') }}"
                           class="admin-input" placeholder="Cth: 1+">
                    @error('stat_1_number')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="stat_1_text" class="admin-label">Stat 1 (Teks)</label>
                    <input type="text" name="stat_1_text" id="stat_1_text"
                           value="{{ old('stat_1_text', $settings['stat_1_text'] ?? '') }}"
                           class="admin-input" placeholder="Cth: Tahun Pengalaman">
                    @error('stat_1_text')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stat_2_number" class="admin-label">Stat 2 (Angka)</label>
                    <input type="text" name="stat_2_number" id="stat_2_number"
                           value="{{ old('stat_2_number', $settings['stat_2_number'] ?? '') }}"
                           class="admin-input" placeholder="Cth: 10+">
                    @error('stat_2_number')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="stat_2_text" class="admin-label">Stat 2 (Teks)</label>
                    <input type="text" name="stat_2_text" id="stat_2_text"
                           value="{{ old('stat_2_text', $settings['stat_2_text'] ?? '') }}"
                           class="admin-input" placeholder="Cth: Proyek Selesai">
                    @error('stat_2_text')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stat_3_number" class="admin-label">Stat 3 (Angka)</label>
                    <input type="text" name="stat_3_number" id="stat_3_number"
                           value="{{ old('stat_3_number', $settings['stat_3_number'] ?? '') }}"
                           class="admin-input" placeholder="Cth: 5+">
                    @error('stat_3_number')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="stat_3_text" class="admin-label">Stat 3 (Teks)</label>
                    <input type="text" name="stat_3_text" id="stat_3_text"
                           value="{{ old('stat_3_text', $settings['stat_3_text'] ?? '') }}"
                           class="admin-input" placeholder="Cth: Klien Puas">
                    @error('stat_3_text')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <h3 class="admin-section-title">About Me Section</h3>
            <div class="space-y-4 mb-8">
                <div>
                    <label for="about_text" class="admin-label">Teks "About Me"</label>
                    <textarea name="about_text" id="about_text" rows="5"
                              class="admin-textarea"
                              placeholder="Tulis paragraf tentang diri Anda..."
                    >{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                     @error('about_text')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tech_skills" class="admin-label">Tech Skills (Pisahkan dengan koma)</label>
                    <input type="text" name="tech_skills" id="tech_skills"
                           value="{{ old('tech_skills', $settings['tech_skills'] ?? '') }}"
                           placeholder="Laravel,PHP,MySQL,Alpine.js"
                           class="admin-input">
                    @error('tech_skills')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <h3 class="admin-section-title">Social Media Links</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="social_whatsapp" class="admin-label">WhatsApp (cth: 6281234...)</label>
                    <input type="text" name="social_whatsapp" id="social_whatsapp"
                           value="{{ old('social_whatsapp', $settings['social_whatsapp'] ?? '') }}"
                           class="admin-input" placeholder="628123456789">
                    @error('social_whatsapp')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_facebook" class="admin-label">Facebook URL</label>
                    <input type="url" name="social_facebook" id="social_facebook"
                           value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}"
                           class="admin-input" placeholder="https://facebook.com/username">
                    @error('social_facebook')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_tiktok" class="admin-label">TikTok URL</label>
                    <input type="url" name="social_tiktok" id="social_tiktok"
                           value="{{ old('social_tiktok', $settings['social_tiktok'] ?? '') }}"
                           class="admin-input" placeholder="https://tiktok.com/@username">
                    @error('social_tiktok')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_instagram" class="admin-label">Instagram URL</label>
                    <input type="url" name="social_instagram" id="social_instagram"
                           value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}"
                           class="admin-input" placeholder="https://instagram.com/username">
                    @error('social_instagram')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_github" class="admin-label">GitHub URL</label>
                    <input type="url" name="social_github" id="social_github"
                           value="{{ old('social_github', $settings['social_github'] ?? '') }}"
                           class="admin-input" placeholder="https://github.com/username">
                    @error('social_github')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_linkedin" class="admin-label">LinkedIn URL</label>
                    <input type="url" name="social_linkedin" id="social_linkedin"
                           value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}"
                           class="admin-input" placeholder="https://linkedin.com/in/username">
                    @error('social_linkedin')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="social_twitter" class.="admin-label">X (Twitter) URL</label>
                    <input type="url" name="social_twitter" id="social_twitter"
                           value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}"
                           class="admin-input" placeholder="https://x.com/username">
                    @error('social_twitter')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit" class="admin-button-primary">
                    Simpan Semua Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
