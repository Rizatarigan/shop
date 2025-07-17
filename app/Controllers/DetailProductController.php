<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Controllers\BaseController;

class DetailProductController extends BaseController
{
    public function show($id)
    {
        $productModel = new ProductModel();

        // Get product details based on ID
        $data['product'] = $productModel->getProductById($id);

        // Show the product detail page
        return view('product_detail', $data);
    }

   public function addToCart($id)
    {
        // Validate input
        if (!is_numeric($id)) {
            return redirect()->back()->with('error', 'Invalid product ID');
        }

        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Get quantity from POST data
        $quantity = $this->request->getPost('qty') ?? 1;
        $quantity = max(1, min(10, (int)$quantity)); // Ensure between 1-10

        $cart = session()->get('cart') ?? [];

        // Check if product exists in cart
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image' => $product['image'] ?? null,
            ];
        }

        session()->set('cart', $cart);
        return redirect()->to('/checkout')->with('success', 'Product added to cart');
    }
}