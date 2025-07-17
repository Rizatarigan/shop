<?php namespace App\Controllers;

use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        
        // Get featured products (limit to 10 for the carousel)
        $data['featured_products'] = $productModel->where('is_featured', 1)->orderBy('created_at', 'DESC')->findAll(10);
        $data['products'] = $productModel->orderBy('created_at', 'DESC')->findAll(8);
        
        return view('home', $data);
    }
}