<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wargas')->insert([
            [
                'nama' => 'John Doe',
                'alamat' => 'Jl. Mawar No. 10',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
            [
                'nama' => 'Jane Smith',
                'alamat' => 'Jl. Melati No. 5',
                'created_at' => '2024-05-27 10:00:00',
                'updated_at' => '2024-05-27 10:00:00',
            ],
        ]);
    }
}
