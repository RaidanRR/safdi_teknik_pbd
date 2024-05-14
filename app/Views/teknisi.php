<?= $this->extend('template') ?>

<?= $this->section('teknisi_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($validasi->hasError('id_teknisi')||$validasi->hasError('nama')||$validasi->hasError('alamat')||$validasi->hasError('no_hp')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <?= $validasi->listErrors() ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Teknisi</h3>
            <p class="text-subtitle text-muted">
            Data teknisi akan ditampilkan disini
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
                data-bs-target="#modalTambahTeknisi"
            >
                Tambah Teknisi
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
                  <?php $i=1 ?>
                    <?php foreach($items as $d): ?>
                    <tr>
                        <td><?= esc($d['id_teknisi']); ?></td>
                        <td><?= esc($d['nama']); ?></td>
                        <td><?= esc($d['alamat']); ?></td>
                        <td><?= esc($d['no_hp']); ?></td>
                        <td>
                        <button type="button" class="btn icon btn-warning" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEditTeknisi<?= esc($d['id_teknisi']); ?>">
                            <i data-feather="edit"></i></button>

                            <!--Modal Form Edit Data -->
                            <div class="modal fade text-left" id="modalEditTeknisi<?= esc($d['id_teknisi']); ?>" tabindex="-1"
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
                                    Form Edit Data Teknisi
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
                                    <form action="/edit-teknisi/<?= esc($d['id_teknisi']); ?>" method="POST">
                                    <?php csrf_field() ?>
                                    <div class="modal-body">
                                        <label>ID: </label>
                                        <div class="form-group">
                                        <input type="number" placeholder="id" name="id_teknisi" class="form-control" required value="<?= (old('id_teknisi'))? old('id_teknisi') : esc($d['id_teknisi']); ?>" min="1"/>
                                        </div>
                                        <label>Nama: </label>
                                        <div class="form-group">
                                        <input type="text" placeholder="nama" name="nama" class="form-control" required value="<?= (old('nama'))? old('nama') : esc($d['nama']); ?>" maxlength="50"/>
                                        </div>
                                        <label>Alamat: </label>
                                        <div class="form-group">
                                        <input type="text" placeholder="alamat" name="alamat" class="form-control" required value="<?= (old('alamat'))? old('alamat') : esc($d['alamat']); ?>" maxlength="50"/>
                                        </div>
                                        <label>No HP: </label>
                                        <div class="form-group">
                                        <input type="number" placeholder="nomor hp" name="no_hp" class="form-control" required value="<?= (old('no_hp'))? old('no_hp') : esc($d['no_hp']); ?>" min="1" maxlength="15"/>
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

                        <button type="button" class="btn icon btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#modalHapusTeknisi<?= esc($d['id_teknisi']); ?>">
                            <i data-feather="trash"></i></button>

                            <!--Danger theme Modal -->
                            <div class="modal fade text-left" id="modalHapusTeknisi<?= esc($d['id_teknisi']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
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
                                        Hapus Data Teknisi
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
                                    Anda yakin ingin menghapus data teknisi ini?
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
                                    <form action="/hapus-teknisi/<?= esc($d['id_teknisi']); ?>" method="post">
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
        <div class="modal fade text-left" id="modalTambahTeknisi" tabindex="-1"
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
                   Form Tambah Teknisi
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
                <form action="/tambah-teknisi" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label>ID: </label>
                    <div class="form-group">
                    <input type="number" placeholder="id teknisi" name="id_teknisi" class="form-control" required value="<?= old('id_teknisi'); ?>" min="1" maxlength="5"/>
                    </div>
                    <label>Nama: </label>
                    <div class="form-group">
                    <input type="text" placeholder="nama" name="nama" class="form-control" required value="<?= old('nama'); ?>" maxlength="50"/>
                    </div>
                    <label>Alamat: </label>
                    <div class="form-group">
                    <input type="text" placeholder="alamat" name="alamat" class="form-control" required value="<?= old('alamat'); ?>" maxlength="50"/>
                    </div>
                    <label>No HP: </label>
                    <div class="form-group">
                    <input type="number" placeholder="nomor hp" name="no_hp" class="form-control" required value="<?= old('no_hp'); ?>" min="1" maxlength="15"/>
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

