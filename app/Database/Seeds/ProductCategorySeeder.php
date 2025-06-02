<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Gaming',
                'deskripsi'     => 'Cocok untuk Gaming',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_kategori' => 'Office',
                'deskripsi'     => 'Cocock Untuk kantoran',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_kategori' => 'Student',
                'deskripsi'     => 'Cocok untuk pelajar',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ];

        // Insert data ke tabel
        $this->db->table('product_category')->insertBatch($data);
    }
}
