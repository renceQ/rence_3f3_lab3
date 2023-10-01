<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class HomeController extends BaseController
{

 public function index()
 {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        // No need to retrieve all products here

        return view('template/index', $data);
      }

    // Add a new method to fetch products by category
    public function getProductsByCategory($categoryId)
    {
        $productModel = new ProductModel();
        $products = $productModel->where('category_id', $categoryId)->findAll();
        return json_encode($products);
    }
}
