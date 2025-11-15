<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    /**
     * Menampilkan daftar semua pesan.
     */
    public function index(): View
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Menampilkan detail satu pesan.
     * Akan menandai pesan sebagai 'sudah dibaca'.
     */
    public function show(Message $message): View
    {
        // Tandai sebagai sudah dibaca jika belum
        if (is_null($message->read_at)) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Hapus pesan dari database.
     */
    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus.');
    }

    // Kita tidak akan menggunakan method create, store, edit, update dari sisi admin
    public function create() { return abort(404); }
    public function store(Request $request) { return abort(404); }
    public function edit(Message $message) { return abort(404); }
    public function update(Request $request, Message $message) { return abort(404); }
}
