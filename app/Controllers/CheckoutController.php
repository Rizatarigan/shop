<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OrderModel;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('checkout', [
            'cart'       => $cart,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function process()
    {
        // Aturan validasi input
        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email',
            'address'    => 'required',
            'city'       => 'required',
            'state'      => 'required',
            'postcode'   => 'required|numeric',
            'phone'      => 'required',
            'payment'    => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Siapkan data order
        $orderModel = new OrderModel();
        $orderData = [
            'first_name'  => $this->request->getPost('first_name'),
            'last_name'   => $this->request->getPost('last_name'),
            'email'       => $this->request->getPost('email'),
            'address'     => $this->request->getPost('address'),
            'city'        => $this->request->getPost('city'),
            'state'       => $this->request->getPost('state'),
            'postcode'    => $this->request->getPost('postcode'),
            'phone'       => $this->request->getPost('phone'),
            'payment'     => $this->request->getPost('payment'),
            'order_notes' => $this->request->getPost('order_notes'),
            'cart'        => serialize(session()->get('cart') ?? [])
        ];

        // Simpan ke database dan ambil ID baru
        $orderModel->insert($orderData);
        $orderId = $orderModel->getInsertID();

        // Kosongkan keranjang
        session()->remove('cart');

        // Redirect ke halaman detail pesanan dengan ID pesanan
        return redirect()->to("/order/{$orderId}")
                         ->with('success', 'Transaksi berhasil, silahkan cek kembali orderan anda');
    }

    public function reset()
    {
        session()->remove('cart');
        return redirect()
            ->to('/checkout')
            ->with('success', 'Checkout telah direset; keranjang kosong.');
    }
}
