<?php
namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $productModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        helper(['form', 'text']);
    }

  public function checkout()
    {
        $cart = session()->get('cart') ?? [];
        
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong');
        }

        // Hitung total dengan benar
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $data = [
            'cart' => $cart,
            'total' => $total, // Pastikan ini ada
            'validation' => \Config\Services::validation()
        ];

        return view('checkout', $data);
    }
    public function placeOrder()
    {
        // Validate input
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'payment' => 'required',
            'agree' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get cart from session
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty');
        }

        // Prepare order data
        $orderData = [
            'user_id' => session()->get('user_id') ?? null,
            'cart' => $cart,
            'status' => 'pending',
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'postcode' => $this->request->getPost('postcode'),
            'phone' => $this->request->getPost('phone'),
            'payment' => $this->request->getPost('payment'),
            'order_notes' => $this->request->getPost('order_notes')
        ];

        // Create order
        $orderId = $this->orderModel->createOrder($orderData);

        if ($orderId) {
            // Clear cart
            session()->remove('cart');
            // Send email confirmation
            $this->sendOrderConfirmation($orderId);
            return redirect()->to("/order/success/$orderId");
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to place order. Please try again.');
        }
    }

    public function orderSuccess($orderId)
    {
        $order = $this->orderModel->find($orderId);
        if (!$order) {
            return redirect()->to('/')->with('error', 'Order not found');
        }

        $data = [
            'order' => $order,
            'cart' => json_decode($order['cart'], true)
        ];

        return view('order_success', $data);
    }

    protected function calculateCartTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    protected function sendOrderConfirmation($orderId)
    {
        // Implement email sending logic here
    }
     public function myOrders()
    {
        // Check if user is logged in
       $userId = auth()->id(); // Asumsi menggunakan Shield
        $orderModel = new \App\Models\OrderModel();
        $data['orders'] = $orderModel->where('user_id', $userId)->findAll();
        
        return view('account/orders', $data);
        }

    public function orderDetail($orderId)
    {
        // Check if user is logged in
        if (!auth()->loggedIn()) {
            return redirect()->to('/login');
        }

        $order = $this->orderModel->getOrderDetails($orderId);

        // Check if order exists and belongs to user
        if (!$order || $order['user_id'] != auth()->id()) {
            return redirect()->to('/my-orders')->with('error', 'Order not found');
        }

        $data = [
            'title' => 'Order #'.$orderId,
            'order' => $order,
            'cartItems' => json_decode($order['cart'], true)
        ];

        return view('orders/order_detail', $data);
    }
    public function show($id)
    {
        $orderModel = new \App\Models\OrderModel();
        $order = $orderModel->find($id);
        
        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Order not found');
        }

        $data = [
            'title' => 'Order Details',
            'order' => $order,
            'cartItems' => json_decode($order['cart'], true)
        ];
        
        return view('admin/orders/show', $data);
    }
    }