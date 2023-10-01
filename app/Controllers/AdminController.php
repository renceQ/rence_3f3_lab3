<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function insert()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        return view('admins/insert', $data);
    }
    public function insert_Prod()
  {
      $productModel = new ProductModel();

      // Get the uploaded file
      $imageFile = $this->request->getFile('image_url');

      // Check if the file is valid
      if ($imageFile->isValid() && !$imageFile->hasMoved()) {
          // Define the upload directory
          $uploadPath = 'C:\laragon\www\rence_3f3_lab3\public\uploads'; // Update this to your local path

          // Move the uploaded file to the upload directory without changing the filename
          $imageFile->move($uploadPath);

          // Get the real name of the uploaded file
          $realFileName = $imageFile->getName();

          // Build the file path with the real name
          $filePath = 'uploads/' . $realFileName;

          // Prepare the data to be inserted into the database
          $data = [
              'product_name' => $this->request->getPost('product_name'),
              'price' => $this->request->getPost('price'),
              'category_id' => $this->request->getPost('category_id'),
              'image_url' => $filePath, // Store the file path in the database
          ];

          // Insert the data into the database
          $productModel->insert($data);

          return redirect()->to('/insert');
      } else {
          return redirect()->back()->with('error', 'File upload failed.');
      }
  }


    public function delete($product_id)
  {
      $productModel = new ProductModel();

      // Check if the product exists before deleting
      $product = $productModel->find($product_id);

      if ($product) {
          $productModel->delete($product_id);
          return $this->response->setStatusCode(200)->setJSON(['message' => 'Product deleted successfully']);
      } else {
          return $this->response->setStatusCode(404)->setJSON(['error' => 'Product not found']);
      }
  }
  public function getProduct($product_id)
{
    $productModel = new ProductModel();
    $product = $productModel->find($product_id);

    if ($product) {
        return $this->response->setStatusCode(200)->setJSON($product);
    } else {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Product not found']);
    }
}
public function getImageUrl($product_id)
{
    $productModel = new ProductModel();
    $product = $productModel->find($product_id);

    if ($product) {
        $imagePath = $product['image_url'];
        $fullImagePath = base_url($imagePath); // Use CodeIgniter's base_url to construct the full image URL

        return $this->response->setStatusCode(200)->setJSON(['image_url' => $fullImagePath]);
    } else {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Product not found']);
    }
}

public function update($product_id)
{
    $productModel = new ProductModel();
    $product = $productModel->find($product_id);

    if (!$product) {
        return redirect()->to('/insert')->with('error', 'Product not found');
    }

    // Handle form submission
    if ($this->request->getMethod() === 'post') {
        // Get the posted data
        $newData = [
            'product_name' => $this->request->getPost('product_name'),
            'price' => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        // Check if a new image file has been uploaded
        $imageFile = $this->request->getFile('image_url');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // If a new image is uploaded, move it and update the image URL
            $uploadPath = 'C:\laragon\www\rence_3f3_lab3\public\uploads'; // Update this to your local path
            $imageFile->move($uploadPath);
            $newData['image_url'] = 'uploads/' . $imageFile->getName();
        }

        // Update the product data
        $productModel->update($product_id, $newData);

        return redirect()->to('/insert')->with('success', 'Product updated successfully');
    }

    // Load the update form with the current product data
    $categoryModel = new CategoryModel();
    $data['categories'] = $categoryModel->findAll();
    $data['product'] = $product;

    return view('admins/update', $data);
}

public function updateForm($product_id)
{
    $productModel = new ProductModel();
    $data['product'] = $productModel->find($product_id);

    if ($data['product']) {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('admins/update', $data);
    } else {
        return redirect()->to('/insert')->with('error', 'Product not found');
    }
}



}
