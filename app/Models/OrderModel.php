<?php 
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'total',
        'status',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'state',
        'postcode',
        'phone',
        'payment',
        'order_notes',
        'cart'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $beforeInsert = ['calculateTotal'];
    protected $beforeUpdate = ['calculateTotal'];

    protected function calculateTotal(array $data)
    {
        if (isset($data['data']['cart'])) {
            $cart = json_decode($data['data']['cart'], true);
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            $data['data']['total'] = $total;
        }
        return $data;
    }

    public function createOrder(array $orderData)
    {
        // Serialize cart data
        if (isset($orderData['cart']) && is_array($orderData['cart'])) {
            $orderData['cart'] = json_encode($orderData['cart']);
        }

        return $this->insert($orderData);
    }

    public function getOrdersByUser($userId)
    {
        return $this->where('user_id', $userId)
                  ->orderBy('created_at', 'DESC')
                  ->findAll();
    }
    public function getOrderDetails($orderId)
    {
        return $this->find($orderId);
    }
     public function getUserOrders($userId)
    {
        return $this->where('user_id', $userId)
                   ->orderBy('created_at', 'DESC')
                   ->findAll();
    }
}