<x-admin-layout>
    <x-slot name="header">
        Pesan Masuk
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="w-full min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subjek
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
                @forelse ($messages as $message)
                    <tr class="bg-white border-b hover:bg-gray-50 {{ is_null($message->read_at) ? 'font-bold text-gray-900' : 'text-gray-600' }}">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">
                            {{ $message->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $message->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $message->subject }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $message->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end items-center space-x-4">
                            <a href="{{ route('messages.show', $message->id) }}" class="font-medium text-indigo-600 hover:underline">
                                {{ is_null($message->read_at) ? 'Baca' : 'Lihat' }}
                            </a>

                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada pesan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
