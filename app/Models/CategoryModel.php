<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'product_category'; // sesuaikan dengan tabel di DB
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori', 'deskripsi', 'created_at', 'updated_at'];
}
