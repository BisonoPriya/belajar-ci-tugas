<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product'; // Sesuaikan dengan nama tabel kamu
    protected $primaryKey = 'id'; // Sesuaikan juga jika primary key-nya beda

    protected $allowedFields = ['nama', 'harga', 'jumlah', 'foto']; // Kolom yang boleh diisi

    // Optional: timestamps
    // protected $useTimestamps = true;
}
