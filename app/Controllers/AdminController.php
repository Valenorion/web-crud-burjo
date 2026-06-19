<?php

namespace App\Controllers;

use App\Models\FoodModel;
use App\Models\DrinkModel;

class AdminController extends BaseController
{
    protected $foodModel;
    protected $drinkModel;

    public function __construct()
    {
        helper('form');
        $this->foodModel = new FoodModel();
        $this->drinkModel = new DrinkModel();
    }

    // ==========================================
    // DASHBOARD
    // ==========================================
    public function dashboard()
    {
        $foods = $this->foodModel->findAll();
        $drinks = $this->drinkModel->findAll();
        
        $data = [
            'foods' => $foods,
            'drinks' => $drinks,
            'total_foods' => count($foods),
            'total_drinks' => count($drinks),
            'foods_available' => $this->foodModel->where('status', 'tersedia')->countAllResults(),
            'drinks_available' => $this->drinkModel->where('status', 'tersedia')->countAllResults(),
            'recent_activities' => [],
            'today_visitors' => 0,
            'today_transactions' => 0,
        ];

        
        return view('dashboard/index', $data);
    }

    // ==========================================
    // CRUD FOODS
    // ==========================================
    public function foods()
    {
        $data = [
            'foods' => $this->foodModel->findAll(),
        ];
        return view('admin/foods/index', $data);
    }

    public function createFood()
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'kategori' => 'required',
            'harga' => 'required|numeric|greater_than[0]',
            'status' => 'permit_empty|in_list[tersedia,habis]',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if (!$this->validate($rules)) {
            $errors = implode(', ', $this->validator->getErrors());
            session()->setFlashdata('failed', 'Gagal menambahkan makanan: ' . $errors);
            return redirect()->back()->withInput();
        }

        $foto = $this->request->getFile('foto');
        $fotoName = '';
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/', $fotoName);
        }

        $data = [
            'nama_makanan' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status') ?? 'tersedia',
            'foto' => $fotoName,
        ];

        $this->foodModel->insert($data);
        session()->setFlashdata('success', 'Makanan berhasil ditambahkan!');
        return redirect()->to('admin/dashboard');
    }

    public function editFood($id)
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'kategori' => 'required',
            'harga' => 'required|numeric|greater_than[0]',
            'status' => 'permit_empty|in_list[tersedia,habis]',
            'foto' => 'permit_empty|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if (!$this->validate($rules)) {
            $errors = implode(', ', $this->validator->getErrors());
            session()->setFlashdata('failed', 'Gagal mengupdate makanan: ' . $errors);
            return redirect()->back()->withInput();
        }

        $oldData = $this->foodModel->find($id);
        if (!$oldData) {
            session()->setFlashdata('failed', 'Data makanan tidak ditemukan!');
            return redirect()->to('admin/dashboard');
        }

        $foto = $this->request->getFile('foto');
        $fotoName = $oldData['foto'] ?? '';
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            if (!empty($oldData['foto']) && file_exists('img/' . $oldData['foto'])) {
                unlink('img/' . $oldData['foto']);
            }
            $fotoName = $foto->getRandomName();
            $foto->move('img/', $fotoName);
        }

        $data = [
            'nama_makanan' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status') ?? 'tersedia',
            'foto' => $fotoName,
        ];

        $this->foodModel->update($id, $data);
        session()->setFlashdata('success', 'Makanan berhasil diupdate!');
        return redirect()->to('admin/dashboard');
    }

    public function deleteFood($id)
    {
        $data = $this->foodModel->find($id);
        if (!$data) {
            session()->setFlashdata('failed', 'Data makanan tidak ditemukan!');
            return redirect()->to('admin/dashboard');
        }

        if (!empty($data['foto']) && file_exists('img/' . $data['foto'])) {
            unlink('img/' . $data['foto']);
        }

        $this->foodModel->delete($id);
        session()->setFlashdata('success', 'Makanan berhasil dihapus!');
        return redirect()->to('admin/dashboard');
    }

    // ==========================================
    // CRUD DRINKS
    // ==========================================
    public function drinks()
    {
        $data = [
            'drinks' => $this->drinkModel->findAll(),
        ];
        return view('admin/drinks/index', $data);
    }

    public function createDrink()
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'kategori' => 'required',
            'harga' => 'required|numeric|greater_than[0]',
            'status' => 'permit_empty|in_list[tersedia,habis]',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
            'ukuran' => 'permit_empty|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $errors = implode(', ', $this->validator->getErrors());
            session()->setFlashdata('failed', 'Gagal menambahkan minuman: ' . $errors);
            return redirect()->back()->withInput();
        }

        $foto = $this->request->getFile('foto');
        $fotoName = '';
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/', $fotoName);
        }

        $data = [
            'nama_minuman' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status') ?? 'tersedia',
            'foto' => $fotoName,
            'ukuran' => $this->request->getPost('ukuran'),
        ];

        $this->drinkModel->insert($data);
        session()->setFlashdata('success', 'Minuman berhasil ditambahkan!');
        return redirect()->to('admin/dashboard');
    }

    public function editDrink($id)
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'kategori' => 'required',
            'harga' => 'required|numeric|greater_than[0]',
            'status' => 'permit_empty|in_list[tersedia,habis]',
            'foto' => 'permit_empty|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
            'ukuran' => 'permit_empty|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $errors = implode(', ', $this->validator->getErrors());
            session()->setFlashdata('failed', 'Gagal mengupdate minuman: ' . $errors);
            return redirect()->back()->withInput();
        }

        $oldData = $this->drinkModel->find($id);
        if (!$oldData) {
            session()->setFlashdata('failed', 'Data minuman tidak ditemukan!');
            return redirect()->to('admin/dashboard');
        }

        $foto = $this->request->getFile('foto');
        $fotoName = $oldData['foto'] ?? '';
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            if (!empty($oldData['foto']) && file_exists('img/' . $oldData['foto'])) {
                unlink('img/' . $oldData['foto']);
            }
            $fotoName = $foto->getRandomName();
            $foto->move('img/', $fotoName);
        }

        $data = [
            'nama_minuman' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status') ?? 'tersedia',
            'foto' => $fotoName,
            'ukuran' => $this->request->getPost('ukuran'),
        ];

        $this->drinkModel->update($id, $data);
        session()->setFlashdata('success', 'Minuman berhasil diupdate!');
        return redirect()->to('admin/dashboard');
    }

    public function deleteDrink($id)
    {
        $data = $this->drinkModel->find($id);
        if (!$data) {
            session()->setFlashdata('failed', 'Data minuman tidak ditemukan!');
            return redirect()->to('admin/dashboard');
        }

        if (!empty($data['foto']) && file_exists('img/' . $data['foto'])) {
            unlink('img/' . $data['foto']);
        }

        $this->drinkModel->delete($id);
        session()->setFlashdata('success', 'Minuman berhasil dihapus!');
        return redirect()->to('admin/dashboard');
    }

    // ==========================================
    // STORE MENU (SATU MODAL UNTUK FOOD & DRINK)
    // ==========================================
    public function storeMenu()
    {
        $jenis = $this->request->getPost('jenis');
        
        if ($jenis == 'makanan') {
            return $this->createFood();
        } else {
            return $this->createDrink();
        }
    }
}