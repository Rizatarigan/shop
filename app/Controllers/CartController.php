<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class CartController extends BaseController
{
    public function add()
    {
        // Mendapatkan data produk berdasarkan ID
        $productModel = new ProductModel();
        $product = $productModel->find($this->request->getPost('product_id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Menambahkan produk ke session cart
        $cart = session()->get('cart') ?: []; // Ambil cart yang ada di session, atau buat array baru jika belum ada
        $cart[] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $this->request->getPost('quantity'),
        ];

        session()->set('cart', $cart); // Set cart ke session

        return redirect()->to('/checkout');
    }
}
