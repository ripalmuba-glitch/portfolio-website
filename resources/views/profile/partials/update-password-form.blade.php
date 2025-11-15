<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-900">
            Perbarui Password
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="admin-label">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password"
                   class="admin-input" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <p class="admin-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="admin-label">Password Baru</label>
            <input id="update_password_password" name="password" type="password"
                   class="admin-input" autocomplete="new-password">
            @error('password', 'updatePassword')
                <p class="admin-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="admin-label">Konfirmasi Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="admin-input" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <p class="admin-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="admin-button-primary">Simpan</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
