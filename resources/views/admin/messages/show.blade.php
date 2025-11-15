<x-admin-layout>
    <x-slot name="header">
        Lihat Pesan
    </x-slot>

    <div class="w-full mb-6">
        <a href="{{ route('messages.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300 ease-in-out">
            &larr; Kembali ke Daftar Pesan
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="border-b pb-4 mb-4">
            <h2 class="text-2xl font-semibold text-gray-900">{{ $message->subject }}</h2>
            <p class="text-sm text-gray-600 mt-2">
                Dari: <span class="font-medium text-gray-800">{{ $message->name }}</span> ({{ $message->email }})
            </p>
            <p class="text-sm text-gray-500">
                Diterima: {{ $message->created_at->format('d M Y \p\u\k\u\l H:i') }}
            </p>
        </div>

        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($message->message)) !!}
        </div>

        <div class="mt-6 pt-6 border-t flex justify-end">
            <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Hapus Pesan Ini
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
