<x-admin-layout>
    <x-slot name="header">
        Kelola Jasa (Services)
    </x-slot>

    <div class="w-full flex justify-end mb-6">
        <a href="{{ route('services.create') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out">
            + Tambah Jasa Baru
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="w-full min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Jasa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ikon
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $service->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ Str::limit($service->description, 50, '...') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $service->icon_class }}
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end items-center space-x-4">
                            <a href="{{ route('services.edit', $service->id) }}" class="font-medium text-indigo-600 hover:underline">Edit</a>

                            <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus jasa ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data jasa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
