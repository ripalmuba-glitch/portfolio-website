<x-admin-layout>
    <x-slot name="header">
        Tambah Jasa Baru
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Jasa</label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description"
                              id="description"
                              rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon_class" class="block text-sm font-medium text-gray-700">Icon Class (Contoh: 'fa-solid fa-code')</label>
                    <input type="text"
                           name="icon_class"
                           id="icon_class"
                           value="{{ old('icon_class') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Opsional. Anda bisa gunakan class dari FontAwesome.</p>
                    @error('icon_class')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('services.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Simpan Jasa
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
