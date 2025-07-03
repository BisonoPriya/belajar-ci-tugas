<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal'    => '2025-07-01',
                'nominal'    => 100000,
                'created_at' => '2025-07-01 12:30:21',
                'updated_at' => '2025-07-01 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-02',
                'nominal'    => 40000,
                'created_at' => '2025-07-02 12:30:21',
                'updated_at' => '2025-07-02 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-03',
                'nominal'    => 75000,
                'created_at' => '2025-07-03 12:30:21',
                'updated_at' => '2025-07-03 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-04',
                'nominal'    => 60000,
                'created_at' => '2025-07-04 12:30:21',
                'updated_at' => '2025-07-04 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-05',
                'nominal'    => 120000,
                'created_at' => '2025-07-05 12:30:21',
                'updated_at' => '2025-07-05 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-06',
                'nominal'    => 50000,
                'created_at' => '2025-07-06 12:30:21',
                'updated_at' => '2025-07-06 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-07',
                'nominal'    => 80000,
                'created_at' => '2025-07-07 12:30:21',
                'updated_at' => '2025-07-07 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-08',
                'nominal'    => 90000,
                'created_at' => '2025-07-08 12:30:21',
                'updated_at' => '2025-07-08 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-09',
                'nominal'    => 150000,
                'created_at' => '2025-07-09 12:30:21',
                'updated_at' => '2025-07-09 12:30:21',
            ],
            [
                'tanggal'    => '2025-07-10',
                'nominal'    => 70000,
                'created_at' => '2025-07-10 12:30:21',
                'updated_at' => '2025-07-10 12:30:21',
            ],
        ];

        $this->db->table('diskon')->insertBatch($data);
    }
}
