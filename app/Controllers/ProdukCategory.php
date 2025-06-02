<?php

namespace App\Controllers;

use App\Models\CategoryModel; // pastikan model ini sudah ada dan sesuai

class ProdukCategory extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new CategoryModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->findAll();
        return view('v_produkcategory', $data);
    }

    public function store()
    {
        $this->kategori->save([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/produk-kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update($id)
    {
        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/produk-kategori')->with('success', 'Kategori berhasil diubah.');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('/produk-kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
