<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table            = 'foods';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_makanan', 'harga', 'deskripsi', 'kategori', 'foto', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_makanan' => 'required|min_length[3]|max_length[255]',
        'harga'        => 'required|numeric|greater_than[0]',
        'kategori'     => 'required|min_length[3]|max_length[100]',
        'status'       => 'permit_empty|in_list[tersedia,habis]',
    ];
    protected $validationMessages   = [
        'nama_makanan' => [
            'required'    => 'Nama makanan wajib diisi.',
            'min_length'  => 'Nama makanan minimal 3 karakter.',
            'max_length'  => 'Nama makanan maksimal 255 karakter.',
        ],
        'harga' => [
            'required'     => 'Harga wajib diisi.',
            'numeric'      => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.',
        ],
        'kategori' => [
            'required'    => 'Kategori wajib diisi.',
            'min_length'  => 'Kategori minimal 3 karakter.',
            'max_length'  => 'Kategori maksimal 100 karakter.',
        ],
        'status' => [
            'in_list' => 'Status harus "tersedia" atau "habis".',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Method tambahan untuk mendapatkan makanan berdasarkan kategori
    public function getByCategory($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }

    // Method untuk mendapatkan makanan yang tersedia
    public function getAvailable()
    {
        return $this->where('status', 'tersedia')->findAll();
    }

    // Method untuk mencari makanan berdasarkan nama
    public function search($keyword)
    {
        return $this->like('nama_makanan', $keyword)->findAll();
    }
}