<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TeknisiModel;

class TeknisiController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new TeknisiModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $fetcheddata['items'] = $data;
        $fetcheddata['validasi'] = \Config\Services::validation();
        // dd($data);
        return view('teknisi', $fetcheddata);
    }

    public function store()
    {
        if (!$this->validate([
            'id_teknisi' => [
                'rules' => 'required|is_unique[teknisi.id_teknisi]',
                'errors' => [
                    'is_unique' => 'ID Teknisi ini sudah ada',
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
            return redirect()->to(base_url('/teknisi'))->withInput()->with('validasi',$validasi);
        }

        $this->model->save([
            'id_teknisi' => $this->request->getVar('id_teknisi'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/teknisi'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('/teknisi'));
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_teknisi' => [
                'rules' => 'required',
                'errors' => [
                    // 'is_unique' => 'ID Teknisi ini sudah ada',
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus berupa string',
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
            return redirect()->to(base_url('/teknisi'))->withInput()->with('validasi',$validasi);
        }

        $this->model->update($id,
        [
            'id_teknisi' => $this->request->getVar('id_teknisi'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('/teknisi'));
    }
}
