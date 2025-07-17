<?php 

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login'); // Menampilkan halaman login
    }

    public function loginProcess()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Mencari user berdasarkan username
        $user = $userModel->where('username', $username)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Jika user adalah admin, arahkan ke dashboard admin
            if ($user['role'] === 'admin') {
                session()->set('user', $user);  // Menyimpan data user di session
                return redirect()->to('/admin/dashboard');  // Redirect ke halaman dashboard admin
            } else {
                // Jika user adalah user biasa, arahkan ke halaman produk
                session()->set('user', $user);  // Menyimpan data user di session
                return redirect()->to('/');  // Redirect ke halaman produk
            }
        }
        
        // Jika login gagal, kembali ke halaman login dengan error
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();  // Menghapus session
        return redirect()->to('/login');  // Redirect kembali ke halaman login
    }

    public function register()
    {
        return view('register'); // Menampilkan halaman registrasi
    }

    public function registerProcess()
    {
        $userModel = new UserModel();

        // Mendapatkan data dari form register
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);  // Password di-hash
        $email = $this->request->getPost('email');
        $role = 'user';  // Default role adalah user

        // Cek apakah username sudah ada
        $existingUser = $userModel->where('username', $username)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Username already exists');
        }

        // Menyimpan data user baru
        $userModel->save([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }
}
