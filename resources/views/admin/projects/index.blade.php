<x-admin-layout>
    <x-slot name="header">
        Kelola Proyek (Projects)
    </x-slot>

    <div class="w-full flex justify-end mb-6">
        <a href="{{ route('projects.create') }}" class="admin-button-primary">
            + Tambah Proyek Baru
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="w-full min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Proyek </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if($project->image)
                                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="h-10 w-16 object-cover rounded-md">
                            @else
                                <span class="text-xs text-gray-400">No Image</span>
                            @endif
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $project->title }} </th>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">
                                {{ $project->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($project->project_date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end items-center space-x-4">
                            <a href="{{ route('projects.edit', $project->id) }}" class="font-medium text-indigo-600 hover:underline">Edit</a>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data proyek.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</x-admin-layout>
