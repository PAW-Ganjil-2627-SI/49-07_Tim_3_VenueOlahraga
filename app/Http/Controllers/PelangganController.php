<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('Layout.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('Layout.input-member');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategoti' => 'required|in:Bronze,Silver,Gold',
            'kontak' => 'required|string|max:12',
        ]);

        $kategori = $request->kategoti;
        $prefixMap = [
            'Gold'   => 'MBR-GLD-',
            'Silver' => 'MBR-SLR-',
            'Bronze' => 'MBR-BRZ-',
        ];

        $prefix = $prefixMap[$kategori] ?? 'MBR-OTH-';

        $latest = Pelanggan::where('id', 'like', $prefix . '%')
                           ->orderBy('id', 'desc')
                           ->first();

        if ($latest) {
            $number = intval(substr($latest->id, strlen($prefix))) + 1;
        } else {
            $number = 1;
        }

        $newId = $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);

        Pelanggan::create([
            'id'       => $newId,
            'nama'     => $request->nama,
            'kategoti' => $request->kategoti,
            'kontak'   => $request->kontak,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('Layout.profile-member', ['data' => $pelanggan]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategoti' => 'required|in:Bronze,Silver,Gold',
            'kontak' => 'required|string|max:12',
        ]);

        $pelanggan->update([
            'nama'     => $request->nama,
            'kategoti' => $request->kategoti,
            'kontak'   => $request->kontak,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data member berhasil diupdate!');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Member berhasil dihapus!');
    }
}
