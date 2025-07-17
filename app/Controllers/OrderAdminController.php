<?php namespace App\Controllers;

use App\Models\OrderModel;
use App\Controllers\BaseController;

class OrderAdminController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Order Management',
            'orders' => $this->orderModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/orders/index', $data);
    }

    public function show($id)
    {
        $order = $this->orderModel->find($id);
        
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

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $validStatuses = ['pending', 'completed', 'canceled'];
        
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status');
        }

        $this->orderModel->update($id, ['status' => $status]);
        return redirect()->back()->with('success', 'Order status updated');
    }
}