<?php

namespace App\Http\Controllers;

use App\Models\GameRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameRevisionController extends Controller
{
    public function index()
    {
        $revisions = GameRevision::orderBy('revision_date', 'desc')->paginate(10);
        return view('revisions.index', compact('revisions'));
    }

    public function create()
    {
        return view('revisions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'revision_date' => 'required|date',
            'revision_type' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed,error',
            'priority' => 'required|integer|min:1|max:5',
            'github_link' => 'nullable|url|max:255', // ✅ Tambahkan validasi GitHub link
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('game_images', 'public');
        }

        GameRevision::create($validated);

        return redirect()->route('revisions.index')
            ->with('success', 'Data revisian berhasil ditambahkan!');
    }

    public function show(GameRevision $revision)
    {
        return view('revisions.show', compact('revision'));
    }

    public function edit(GameRevision $revision)
    {
        return view('revisions.edit', compact('revision'));
    }

    public function update(Request $request, GameRevision $revision)
    {
        $validated = $request->validate([
            'game_title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'revision_date' => 'required|date',
            'revision_type' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed,error',
            'priority' => 'required|integer|min:1|max:5',
            'github_link' => 'nullable|url|max:255', // ✅ Tambahkan validasi GitHub link
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Ganti gambar jika upload baru
        if ($request->hasFile('image')) {
            if ($revision->image && Storage::disk('public')->exists($revision->image)) {
                Storage::disk('public')->delete($revision->image);
            }

            $validated['image'] = $request->file('image')->store('game_images', 'public');
        }

        $revision->update($validated);

        return redirect()->route('revisions.index')
            ->with('success', 'Data revisian berhasil diupdate!');
    }

    public function destroy(GameRevision $revision)
    {
        if ($revision->image && Storage::disk('public')->exists($revision->image)) {
            Storage::disk('public')->delete($revision->image);
        }

        $revision->delete();

        return redirect()->route('revisions.index')
            ->with('success', 'Data revisian berhasil dihapus!');
    }
}
