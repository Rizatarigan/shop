<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    // Method untuk menampilkan halaman dashboard
    public function dashboard()
    {
        // Mengarahkan ke halaman view dashboard
        return view('admin/dashboard');
    }
}
