<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return array
     */
    public function index()
    {
        return Anggota::all()->toArray();
    }
    public function show($id)
    {
        try {
            $anggota = Anggota::findOrFail($id);
            return response()->json($anggota);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => ['message' => 'Anggota not found']], 404);
        }
    }

    public function store(Request $request)
    {
        // Buat buku baru dengan menggunakan data yang diterima dari permintaan
        $book = Anggota::create($request->all());

        // Berikan respons berupa data buku yang berhasil dibuat
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        // Temukan buku yang akan diperbarui
        $book = Anggota::findOrFail($id);
        $book->fill($request->all());

        // Simpan perubahan
        $book->save();

        // Berikan respons berupa buku yang berhasil diperbarui
        return response()->json($book, 200);
    }

    public function delete($id)
    {
        $book = Anggota::findOrFail($id);
        $book->delete();

        return response()->json(['deleted' => true], 200);
    }
}