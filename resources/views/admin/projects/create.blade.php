<x-admin-layout>
    <x-slot name="header">
        Tambah Proyek Baru
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="title" class="admin-label">Judul Proyek</label> <input type="text" name="title" id="title" value="{{ old('title') }}" class="admin-input" required>
                    @error('title') <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="admin-label">Kategori (Cth: Web App, Landing Page)</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}"
                           class="admin-input" required>
                    @error('category')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_date" class="admin-label">Tanggal Selesai Proyek</label>
                    <input type="date" name="project_date" id="project_date" value="{{ old('project_date') }}"
                           class="admin-input" required>
                    @error('project_date')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="admin-label">Gambar Proyek</label>
                    <input type="file" name="image" id="image" class="admin-file-input" required>
                    <p class="mt-1 text-xs text-gray-500">Wajib. Format: JPG, PNG, JPEG. Maks 2MB.</p>
                    @error('image')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_url" class="admin-label">URL Proyek (Link Live)</label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}"
                           placeholder="https://example.com"
                           class="admin-input">
                    @error('project_url')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="shopee_url" class="admin-label">URL Shopee</label>
                    <input type="url" name="shopee_url" id="shopee_url" value="{{ old('shopee_url') }}"
                           placeholder="https://shopee.co.id/..."
                           class="admin-input">
                    @error('shopee_url')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="admin-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="5"
                              class="admin-textarea"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('projects.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Batal
                </a>
                <button type="submit" class="admin-button-primary">
                    Simpan Proyek
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
