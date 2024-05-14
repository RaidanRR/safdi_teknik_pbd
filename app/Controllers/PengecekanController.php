<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\PengecekanModel;
use App\Models\BarangModel;
use App\Models\TeknisiModel;
use App\Models\DetailPengecekanBarangModel;

class PengecekanController extends BaseController
{

    protected $modelCustomer;
    protected $modelPengecekan;
    protected $modelBarang;
    protected $modelTeknisi;
    protected $modelDetailPengecekanBarang;
    public function __construct()
    {
        $this->modelCustomer = new CustomerModel();
        $this->modelPengecekan = new PengecekanModel();
        $this->modelBarang = new BarangModel();
        $this->modelTeknisi = new TeknisiModel();
        $this->modelDetailPengecekanBarang = new DetailPengecekanBarangModel();
        helper('date');
    }
    
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengecekan');
        $builder->select('pengecekan.kode_pengecekan, customer.nama AS nama_customer, teknisi.nama AS nama_teknisi , pengecekan.created_at AS tanggal');
        $builder->join('customer', 'customer.id_customer = pengecekan.id_customer');
        $builder->join('teknisi', 'teknisi.id_teknisi = pengecekan.id_teknisi');
        $builder->orderBy('tanggal', 'DESC');
        $query = $builder->get()->getResultArray();
        $fetcheddata['items'] = $query;
        // dd($query);
        return view('pengecekan', $fetcheddata);
    }

    public function create()
    {
        $dataCustomer = $this->modelCustomer->findAll();
        $dataTeknisi = $this->modelTeknisi->findAll();
        $fetcheddata['customer'] = $dataCustomer;
        $fetcheddata['teknisi'] = $dataTeknisi;
        $fetcheddata['validasi'] = \Config\Services::validation();
        return view('pengecekan-tambah', $fetcheddata);
    }
    
    public function tambahbarang($kode)
    {
        $ada = $this->modelDetailPengecekanBarang->findAll();

        $dataDetail = $this->modelDetailPengecekanBarang->where('kode_pengecekan',$kode)->findColumn('kode_barang');
        if ($ada && $dataDetail) {
            $dataBarang = $this->modelBarang->whereNotIn('kode_barang',$dataDetail, true)->findAll();
        } else {
            $dataBarang = $this->modelBarang->findAll();
        }
        // dd($adangga);
        $fetcheddata['barang'] = $dataBarang;
        $fetcheddata['kode'] = $kode;
        return view('pengecekan-tambah-barang', $fetcheddata);
    }
    
    public function store()
    {
        if (!$this->validate([
            'kode_pengecekan' => [
                'rules' => 'required|is_unique[pengecekan.kode_pengecekan]',
                'errors' => [
                    'is_unique' => 'Kode pengecekan ini sudah ada',
                    'required' => 'Kode pengecekan harus diisi',
                ]
            ],
            'id_teknisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'id_customer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to(base_url('/tambah-pengecekan'))->withInput()->with('validasi',$validasi);
        }

        $kode_cek = $this->request->getVar('kode_pengecekan');
        $this->modelPengecekan->save([
            'kode_pengecekan' => $kode_cek,
            'id_teknisi' => $this->request->getVar('id_teknisi'),
            'id_customer' => $this->request->getVar('id_customer'),
            'tanggal' => date("Y-m-d H:i:s"),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/PengecekanController/show/'.$kode_cek));
    }
    
    public function show($id)
    {
        $db      = \Config\Database::connect();

        // data pengecekan
        $builder_cek = $db->table('pengecekan');
        $builder_cek->select('pengecekan.*, customer.nama AS nama_customer, teknisi.nama AS nama_teknisi');
        $builder_cek->join('customer', 'customer.id_customer = pengecekan.id_customer');
        $builder_cek->join('teknisi', 'teknisi.id_teknisi = pengecekan.id_teknisi');
        $detail_cek = $builder_cek->getWhere(['kode_pengecekan' => $id])->getResultArray();
        $fetcheddata['cek'] = $detail_cek[0];
        
        // data barang yang di cek
        $builder_barang = $db->table('detail_pengecekan_barang');
        $builder_barang->select('detail_pengecekan_barang.id, detail_pengecekan_barang.kode_pengecekan, detail_pengecekan_barang.kode_barang, barang_customer.nama_barang, detail_pengecekan_barang.keluhan_barang, detail_pengecekan_barang.jumlah');
        $builder_barang->join('barang_customer', 'barang_customer.kode_barang = detail_pengecekan_barang.kode_barang');
        $barang = $builder_barang->getWhere(['detail_pengecekan_barang.kode_pengecekan' => $id])->getResultArray();
        $fetcheddata['barang'] = $barang;


        $fetcheddata['validasi'] = \Config\Services::validation();
        // dd($fetcheddata);
        return view('pengecekan-detail', $fetcheddata);
    }

    public function store_tambah_barang()
    {
        $kode_cek = $this->request->getVar('kode_pengecekan');
        $this->modelDetailPengecekanBarang->save([
            'kode_pengecekan' => $kode_cek,
            'kode_barang' => $this->request->getVar('kode_barang'),
            'keluhan_barang' => $this->request->getVar('keluhan_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('PengecekanController/show/' .$kode_cek));
    }
    
    public function delete_barang_cek($id)
    {
        $this->modelDetailPengecekanBarang->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function tambah_harga_deskripsi($kode)
    {
        $this->modelPengecekan->update($kode,
        [
            'harga_perbaikan' => $this->request->getVar('harga_perbaikan'),
            'deskripsi_pengecekan' => $this->request->getVar('deskripsi_pengecekan'),
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->back();
    }

    public function update_barang_cek($id)
    {
        $this->modelDetailPengecekanBarang->update($id,
        [
            'keluhan_barang' => $this->request->getVar('keluhan_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function delete_pengecekan($id)
    {
        $this->modelPengecekan->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->back();
    }
    
    public function edit()
    {
        return view('pengecekan-detail');
    }

    public function update($id)
    {
        //
    }
}
