<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image', 'is_featured'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getFeaturedProducts($limit = 10)
    {
        return $this->where('is_featured', 1)
                   ->orderBy('created_at', 'DESC')
                   ->findAll($limit);
    }
   public function getProductById($id)
    {
        try {
            return $this->where('id', $id)->first();
        } catch (\Exception $e) {
            log_message('error', 'Error getting product: '.$e->getMessage());
            return false;
        }
    }
}