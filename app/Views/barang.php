<?= $this->extend('template') ?>

<?= $this->section('data_barang_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($validasi->hasError('kode_barang')||$validasi->hasError('nama_barang')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <?= $validasi->listErrors() ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Barang Konsumen</h3>
            <p class="text-subtitle text-muted">
            Barang apa saja yang diperbaiki akan ditampilkan disini
            </p>
        </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        <div class="card-header float-start">
            <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalTambahBarang"
            >
                Tambah Barang
            </button>
        </div>
        <div class="card-body">
        <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($items as $d): ?>
                    <tr>
                        <td><?= esc($d['kode_barang']); ?></td>
                        <td><?= esc($d['nama_barang']); ?></td>
                        <td>
                        <button type="button" class="btn icon btn-warning" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEditBarang<?= esc($d['kode_barang']); ?>">
                            <i data-feather="edit"></i></button>

                            <!--Modal Form Edit Data -->
                            <div class="modal fade text-left" id="modalEditBarang<?= esc($d['kode_barang']); ?>" tabindex="-1"
                                role="dialog"
                                aria-labelledby="myModalLabel33"
                                aria-hidden="true">
                                <div
                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document"
                                >
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">
                                    Form Edit Barang
                                    </h4>
                                    <button
                                        type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i data-feather="x"></i>
                                    </button>
                                    </div>
                                    <form action="/BarangController/update/<?= esc($d['kode_barang']); ?>" method="POST">
                                    <?php csrf_field() ?>
                                    <div class="modal-body">
                                        <label>Kode Barang: </label>
                                        <div class="form-group">
                                        <input type="text" placeholder="nama" name="kode_barang" class="form-control" value="<?= (old('kode_barang'))? old('kode_barang') : esc($d['kode_barang']); ?>"/>
                                        </div>
                                        <label>Nama Barang: </label>
                                        <div class="form-group">
                                        <input type="text" placeholder="nama" name="nama_barang" class="form-control" value="<?= (old('nama_barang'))? old('nama_barang') : esc($d['nama_barang']); ?>"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" >
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tutup</span>
                                        </button>
                                        <button type="submit" class="btn btn-warning ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Edit</span>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>

                        <button type="button" class="btn icon btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#modalHapusBarang<?= esc($d['kode_barang']); ?>">
                            <i data-feather="trash"></i></button>

                            <!--Danger theme Modal -->
                            <div class="modal fade text-left" id="modalHapusBarang<?= esc($d['kode_barang']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                <div
                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document"
                                >
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                    <h5
                                        class="modal-title white"
                                        id="myModalLabel120"
                                    >
                                        Hapus Data Barang
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i data-feather="x"></i>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Anda yakin ingin menghapus data barang ini?
                                    </div>
                                    <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-light-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block"
                                        >Tutup</span
                                        >
                                    </button>
                                    <form action="/BarangController/delete/<?= esc($d['kode_barang']); ?>" method="post">
                                    <?php csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                        <button
                                            type="submit"
                                            class="btn btn-danger ml-1"
                                        >
                                            <i
                                            class="bx bx-check d-block d-sm-none"
                                            ></i>
                                            <span class="d-none d-sm-block"
                                            >Hapus</span
                                            >
                                        </button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
        </div>
        </div>

        <!--Modal Form Tambah Data -->
        <div class="modal fade text-left" id="modalTambahBarang" tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div
            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document"
            >
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                   Form Tambah Barang
                </h4>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button>
                </div>
                <form action="/tambah-barang" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label>Kode Barang: </label>
                    <div class="form-group">
                    <input type="text" placeholder="kode" name="kode_barang" required class="form-control"/>
                    </div>
                    <label>Nama Barang: </label>
                    <div class="form-group">
                    <input type="text" placeholder="nama" name="nama_barang" required class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" >
                        <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tambahkan</span>
                    </button>
                </div>
                </form>
            </div>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection() ?>

