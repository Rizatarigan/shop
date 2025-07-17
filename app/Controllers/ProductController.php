<?php namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('product_list', $data);
    }

    public function create()
    {
        return view('product_create');
    }

    public function store()
    {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock')
        ];
        $productModel->save($data);
        return redirect()->to('/product');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);
        return view('product_edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock')
        ];
        $productModel->update($id, $data);
        return redirect()->to('/product');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/product');
    }
}
