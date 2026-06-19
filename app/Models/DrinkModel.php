<?php

namespace App\Models;

use CodeIgniter\Model;

class DrinkModel extends Model
{
    protected $table            = 'drinks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_minuman', 'harga', 'deskripsi', 'kategori', 'ukuran', 'foto', 'status'];

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
        'nama_minuman' => 'required|min_length[3]|max_length[255]',
        'harga'        => 'required|numeric|greater_than[0]',
        'kategori'     => 'required|min_length[3]|max_length[100]',
        'ukuran'       => 'required|in_list[Small,Medium,Large]',
        'status'       => 'permit_empty|in_list[tersedia,habis]',
    ];
    protected $validationMessages   = [
        'nama_minuman' => [
            'required'    => 'Nama minuman wajib diisi.',
            'min_length'  => 'Nama minuman minimal 3 karakter.',
            'max_length'  => 'Nama minuman maksimal 255 karakter.',
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
        'ukuran' => [
            'required' => 'Ukuran wajib dipilih.',
            'in_list'  => 'Ukuran harus Small, Medium, atau Large.',
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

    // Method tambahan untuk mendapatkan minuman berdasarkan kategori
    public function getByCategory($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }

    // Method untuk mendapatkan minuman berdasarkan ukuran
    public function getBySize($ukuran)
    {
        return $this->where('ukuran', $ukuran)->findAll();
    }

    // Method untuk mendapatkan minuman yang tersedia
    public function getAvailable()
    {
        return $this->where('status', 'tersedia')->findAll();
    }

    // Method untuk mencari minuman berdasarkan nama
    public function search($keyword)
    {
        return $this->like('nama_minuman', $keyword)->findAll();
    }
}