<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IuransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iurans')->insert([
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-01-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-02-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-03-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-04-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-05-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 1, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-06-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 2, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-03-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 2, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-04-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'id_wargas' => 2, // Pastikan ID ini ada di tabel wargas
                'bulan' => '2024-05-01',
                'jumlah_iuran' => 50000.00,
                'status' => 'pending',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
        ]);
    }
}
