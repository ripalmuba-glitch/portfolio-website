<x-admin-layout>
    <x-slot name="header">
        Edit Proyek: {{ $project->title }} </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="title" class="admin-label">Judul Proyek</label> <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="admin-input" required>
                    @error('title') <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="admin-label">Kategori</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $project->category) }}"
                           class="admin-input" required>
                    @error('category')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_date" class="admin-label">Tanggal Selesai Proyek</label>
                    <input type="date" name="project_date" id="project_date" value="{{ old('project_date', $project->project_date->format('Y-m-d')) }}"
                           class="admin-input" required>
                    @error('project_date')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="admin-label">Gambar Proyek (Ganti)</label>
                    <input type="file" name="image" id="image" class="admin-file-input">
                    <p class="mt-1 text-xs text-gray-500">Opsional. Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    @error('image')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini:</label>
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="mt-2 h-24 w-auto object-cover rounded-md">
                    </div>
                </div>

                <div>
                    <label for="project_url" class="admin-label">URL Proyek (Link Live)</label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url) }}"
                           placeholder="https://example.com"
                           class="admin-input">
                    @error('project_url')
                        <p class="admin-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="shopee_url" class="admin-label">URL Shopee</label>
                    <input type="url" name="shopee_url" id="shopee_url" value="{{ old('shopee_url', $project->shopee_url) }}"
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
                              required>{{ old('description', $project->description) }}</textarea>
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
                    Update Proyek
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
