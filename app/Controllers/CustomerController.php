<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Validation\StrictRules\Rules;

class CustomerController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new CustomerModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $fetcheddata['items'] = $data;
        $fetcheddata['validasi'] = \Config\Services::validation();
        // dd($data);
        return view('customer', $fetcheddata);
    }

    public function store()
    {
        if (!$this->validate([
            'id_customer' => [
                'rules' => 'required|is_unique[customer.id_customer]',
                'errors' => [
                    'is_unique' => 'ID Pelanggan ini sudah ada',
                    'required' => '{field} harus diisi',
                ]
            ],
            'nama' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka',
                ]
            ],
            'alamat' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ],
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to(base_url('/customer'))->withInput()->with('validasi',$validasi);
        }

        $this->model->save([
            'id_customer' => $this->request->getVar('id_customer'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/customer'));
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('/customer'));
    }

    public function update($id)
    {
        
        if (!$this->validate([
            'id_customer' => [
                'rules' => 'required',
                'errors' => [
                    'is_unique' => 'ID Pelanggan ini sudah ada',
                    'required' => '{field} harus diisi',
                ]
            ],
            'nama' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ],
            'alamat' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka',
                ]
            ],
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to(base_url('/customer'))->withInput()->with('validasi',$validasi);
        }

        $this->model->update($id,
        [
            'id_customer' => $this->request->getVar('id_customer'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('/customer'));
    }

}
