<?= $this->extend('template') ?>

<?= $this->section('customer_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($validasi->hasError('id_customer')||$validasi->hasError('nama')||$validasi->hasError('alamat')||$validasi->hasError('no_hp')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <?= $validasi->listErrors() ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Pelanggan</h3>
            <p class="text-subtitle text-muted">
            Data Pelanggan akan ditampilkan disini
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
                Tambah Pelanggan
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $d): ?>
                <tr>
                    <td><?= esc($d['id_customer']); ?></td>
                    <td><?= esc($d['nama']); ?></td>
                    <td><?= esc($d['alamat']); ?></td>
                    <td><?= esc($d['no_hp']); ?></td>
                    <td>
                    <button type="button" class="btn icon btn-warning" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEditCustomer<?= esc($d['id_customer']); ?>">
                        <i data-feather="edit"></i></button>
                        <!--Modal Form Edit Data -->
                        <div class="modal fade text-left" id="modalEditCustomer<?= esc($d['id_customer']); ?>" tabindex="-1"
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
                                Form Edit Data Konsumen
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
                                <form action="/edit-customer/<?= esc($d['id_customer']); ?>" method="POST">
                                <?php csrf_field() ?>
                                <div class="modal-body">
                                    <label>ID: </label>
                                    <div class="form-group">
                                    <input type="number" placeholder="id" name="id_customer" class="form-control" value="<?= (old('id_customer'))? old('id_customer') : esc($d['id_customer']); ?>" min="1" required/>
                                    </div>
                                    <label>Nama: </label>
                                    <div class="form-group">
                                    <input type="text" placeholder="nama" class="form-control" name="nama" required value="<?= (old('nama'))? old('nama') : esc($d['nama']); ?>"/>
                                    </div>
                                    <label>Alamat: </label>
                                    <div class="form-group">
                                    <input type="text" placeholder="alamat" class="form-control" name="alamat" required value="<?= (old('alamat'))? old('alamat') : esc($d['alamat']); ?>"/>
                                    </div>
                                    <label>No HP: </label>
                                    <div class="form-group">
                                    <input type="number"placeholder="nomor hp" class="form-control" name="no_hp" required value="<?= (old('no_hp'))? old('no_hp') : esc($d['no_hp']); ?>" min="1"/>
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

                    <button type="button" class="btn icon btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#modalHapusCustomer<?= esc($d['id_customer']); ?>">
                        <i data-feather="trash"></i></button>
                    <!--Danger theme Modal -->
                    <div class="modal fade text-left" id="modalHapusCustomer<?= esc($d['id_customer']); ?>" tabindex="-1"
                    role="dialog"
                    aria-labelledby="myModalLabel120"
                    aria-hidden="true"
                    >
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
                                Hapus Data Konsumen
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
                            Anda yakin ingin menghapus data konsumen ini?
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
                            <form action="/hapus-customer/<?= esc($d['id_customer']); ?>" method="post">
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
                   Form Tambah Pelanggan
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
                <form action="/tambah-customer" method="POST">
                <?= csrf_field(); ?>
                    <div class="modal-body">
                        <label>ID: </label>
                        <div class="form-group">
                        <input type="number" placeholder="id" name="id_customer" class="form-control" value="<?= old('id_customer'); ?>" min="1" required/>
                        </div>
                        <label>Nama: </label>
                        <div class="form-group">
                        <input type="text" placeholder="nama" name="nama" class="form-control" value="<?= old('nama'); ?>" required/>
                        </div>
                        <label>Alamat: </label>
                        <div class="form-group">
                        <input type="text" placeholder="alamat" name="alamat" class="form-control" value="<?= old('alamat'); ?>" required/>
                        </div>
                        <label>No HP: </label>
                        <div class="form-group">
                            <input type="number"placeholder="nomor hp" name="no_hp" class="form-control" value="<?= old('no_hp'); ?>" min="1" required/>
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

