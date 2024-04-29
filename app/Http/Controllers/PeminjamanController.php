<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return array
     */
    public function index()
    {
        // Mengambil data peminjaman beserta informasi anggota yang melakukan peminjaman
        $peminjaman = Peminjaman::with('anggota')->get();

        // Membuat array untuk menyimpan data peminjaman beserta informasi anggota
        $data = [];
        foreach ($peminjaman as $item) {
            $data[] = [
                'id' => $item->id,
                'id_anggota' => $item->id_anggota,
                'tanggal_pinjam' => $item->tanggal_pinjam,
                'jumlah_pinjam' => $item->jumlah_pinjam,
                'status' => $item->status
            ];
        }

        // Mengembalikan data dalam bentuk response JSON
        return response()->json(['data' => $data]);
    }
    public function store(Request $request)
    {
        $peminjaman = Peminjaman::create($request->all());

        return response()->json([
            'message' => 'Data peminjaman berhasil ditambahkan',
            'data' => [
                'id' => $peminjaman->id,
                'id_anggota' => $peminjaman->id_anggota,
                'tanggal_pinjam' => $peminjaman->tanggal_pinjam,
                'jumlah_pinjam' => $peminjaman->jumlah_pinjam,
                'status' => $peminjaman->status
            ]
        ], 201);
    }
    public function show($id)
    {
        $peminjaman = Peminjaman::with('anggota')->findOrFail($id);

        // Memeriksa apakah peminjaman dengan ID yang diberikan ada
        if ($peminjaman) {
            // Membuat array untuk menyimpan data peminjaman beserta informasi anggota
            $data = [
                'id' => $peminjaman->id,
                'id_anggota' => $peminjaman->id_anggota,
                'tanggal_pinjam' => $peminjaman->tanggal_pinjam,
                'jumlah_pinjam' => $peminjaman->jumlah_pinjam,
                'status' => $peminjaman->status
            ];

            // Mengembalikan data dalam bentuk response JSON
            return response()->json(['data' => $data]);
        } else {
            // Mengembalikan respons JSON jika peminjaman tidak ditemukan
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }
    public function update($id, Request $request)
    {
        try {
            // Mengambil data peminjaman berdasarkan ID
            $peminjaman = Peminjaman::findOrFail($id);
    
            // Memperbarui status peminjaman berdasarkan data dari body permintaan
            $peminjaman->update($request->only('status'));

            $peminjaman->makeHidden(['created_at', 'updated_at']);
    
            // Mengembalikan respons JSON jika pembaruan berhasil
            return response()->json([
                'message' => 'Data peminjaman berhasil diperbarui',
                'data' => $peminjaman->refresh() // Refresh data untuk memastikan informasi terbaru
            ]);
        } catch (ModelNotFoundException $e) {
            // Mengembalikan respons JSON jika peminjaman tidak ditemukan
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }

    public function delete($id)
    {
        try {
            // Menghapus data peminjaman berdasarkan ID
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->delete();
    
            // Mengembalikan respons JSON jika penghapusan berhasil
            return response()->json(['message' => 'Data peminjaman berhasil dihapus']);
        } catch (ModelNotFoundException $e) {
            // Mengembalikan respons JSON jika peminjaman tidak ditemukan
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }
}