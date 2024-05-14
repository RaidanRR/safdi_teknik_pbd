<?php

namespace App\Controllers;

use App\Models\BarangModel;

class BarangController extends BaseController
{
    protected $modelcustomer;
    public function __construct()
    {
        $this->model = new BarangModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $fetcheddata['items'] = $data;
        $fetcheddata['validasi'] = \Config\Services::validation();
        // dd($data);
        return view('barang', $fetcheddata);
    }

    public function store()
    {
        if (!$this->validate([
            'kode_barang' => [
                'rules' => 'required|string|is_unique[barang_customer.kode_barang]',
                'errors' => [
                    'is_unique' => 'Kode barang ini sudah ada',
                    'required' => 'Kode barang harus diisi',
                    'string' => 'Kode barang harus berupa string',
                ]
            ],
            'nama_barang' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to(base_url('/barang'))->withInput()->with('validasi',$validasi);
        }

        $this->model->save([
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/barang'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('/barang'));
    }

    public function update($id)
    {
        if (!$this->validate([
            'kode_barang' => [
                'rules' => 'required|string',
                'errors' => [
                    // 'is_unique' => '{field} sudah ada',
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ],
            'nama_barang' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to(base_url('/barang'))->withInput()->with('validasi',$validasi);
        }

        $this->model->update($id,
        [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('/barang'));

    }

}
