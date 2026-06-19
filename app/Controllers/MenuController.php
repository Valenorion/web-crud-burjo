<?php

namespace App\Controllers;

use App\Models\FoodModel;
use App\Models\DrinkModel;

class MenuController extends BaseController
{
    protected $foodModel;
    protected $drinkModel;

    public function __construct()
    {
        $this->foodModel = new FoodModel();
        $this->drinkModel = new DrinkModel();
    }

    public function index()
    {
        $foods = $this->foodModel->findAll();
        $drinks = $this->drinkModel->findAll();
        
        // Gabungkan makanan & minuman untuk ditampilkan di menu customer
        $menuItems = [];
        
        if(!empty($foods)){
            foreach($foods as $item){
                $item['_type'] = 'makanan';
                $item['_nama'] = $item['nama_makanan'] ?? 'Menu';
                $menuItems[] = $item;
            }
        }
        
        if(!empty($drinks)){
            foreach($drinks as $item){
                $item['_type'] = 'minuman';
                $item['_nama'] = $item['nama_minuman'] ?? 'Menu';
                $menuItems[] = $item;
            }
        }

        $data = [
            'menuItems' => $menuItems,  // ✅ Hanya ini yang diperlukan
        ];

        return view('v_menu', $data);  // ✅ Perbaiki ke menu/index
    }
}