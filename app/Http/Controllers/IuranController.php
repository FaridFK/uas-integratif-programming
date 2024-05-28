<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iuran;
use App\Models\Warga;

class IuranController extends Controller
{
    public function index()
    {
        // Mengambil semua entri dari tabel iurans
        $iurans = Iuran::all();

        // Response
        return response()->json([
            'data' => $iurans
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi request
        $this->validate($request, [
            'id_wargas' => 'required|exists:wargas,id',
            'bulan' => 'required|date_format:Y-m',
            'jumlah_iuran' => 'required|numeric',
            'status' => 'required|string'
        ]);

        // Buat entri baru
        $iuran = Iuran::create([
            'id_wargas' => $request->input('id_wargas'),
            'bulan' => $request->input('bulan'),
            'jumlah_iuran' => $request->input('jumlah_iuran'),
            'status' => $request->input('status')
        ]);

        // Response
        return response()->json([
            'message' => 'Data iuran berhasil ditambahkan',
            'data' => $iuran
        ], 201);
    }

    public function show($id)
    {
        // Mengambil entri dari tabel iurans berdasarkan ID
        $iuran = Iuran::find($id);

        if (!$iuran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // Response
        return response()->json([
            'data' => $iuran
        ], 200);
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $this->validate($request, [
            'status' => 'required|string'
        ]);

        // Mengambil entri dari tabel iurans berdasarkan ID
        $iuran = Iuran::find($id);

        if (!$iuran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // Update entri
        $iuran->status = $request->input('status');
        $iuran->save();

        // Response
        return response()->json([
            'message' => 'Data iuran berhasil diperbarui',
            'data' => $iuran
        ], 200);
    }

    public function destroy($id)
    {
        // Mengambil entri dari tabel iurans berdasarkan ID
        $iuran = Iuran::find($id);

        if (!$iuran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // Hapus entri
        $iuran->delete();

        // Response
        return response()->json([
            'message' => 'Data iuran berhasil dihapus'
        ], 200);
    }

    public function tunggakan($tahun)
    {
        // Mengambil semua data warga dengan iurans berdasarkan tahun dan status pending
        $wargas = Warga::with(['iurans' => function ($query) use ($tahun) {
            $query->where('bulan', 'like', $tahun.'-%')
                  ->where('status', 'pending');
        }])->get();

        $dataTunggakan = [];

        // Looping semua warga
        foreach ($wargas as $warga) {
            // Menghitung total tunggakan untuk warga tersebut
            $totalTunggakan = 0;
            $detailTunggakan = [];

            foreach ($warga->iurans as $iuran) {
                $totalTunggakan += $iuran->jumlah_iuran;
                $detailTunggakan[] = [
                    'bulan' => $iuran->bulan,
                    'jumlah_iuran' => $iuran->jumlah_iuran
                ];
            }

            // Jika total tunggakan lebih dari 0, tambahkan ke data tunggakan
            if ($totalTunggakan > 0) {
                $dataTunggakan[] = [
                    'id' => $warga->id,
                    'nama' => $warga->nama,
                    'alamat' => $warga->alamat,
                    'total_tunggakan' => $totalTunggakan,
                    'detail_tunggakan' => $detailTunggakan
                ];
            }
        }

        // Response
        return response()->json([
            'data' => $dataTunggakan
        ], 200);
    }
}
