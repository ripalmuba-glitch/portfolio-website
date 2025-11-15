<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-gray-900">
            Hapus Akun
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="admin-button-danger"
    >Hapus Akun</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Apakah Anda yakin ingin menghapus akun Anda?
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                Setelah akun Anda dihapus, semua data akan hilang. Harap masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
            </p>

            <div class="mt-6">
                <label for="password" class="admin-label sr-only">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="admin-input"
                    placeholder="Password"
                >
                @error('password', 'userDeletion')
                    <p class="admin-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Batal
                </button>

                <button type="submit" class="admin-button-danger ms-3">
                    Hapus Akun
                </button>
            </div>
        </form>
    </x-modal>
</section>
