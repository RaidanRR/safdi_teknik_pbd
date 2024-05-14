<?= $this->extend('template') ?>

<?= $this->section('pengecekan_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data pengecekan barang konsumen</h3>
            <p class="text-subtitle text-muted">
            Pengecekan Barang yang diperbaiki akan ditampilkan disini
            </p>
        </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        <div class="card-header float-start">
            <a href="/tambah-pengecekan" class="btn icon icon-left btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white" width="30"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>    
            Tambah Pengecekan</a>
        </div>
        <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
            <tr>
                <th>Kode Pengecekan</th>
                <th>Nama Pelanggan</th>
                <th>Nama Teknisi</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $d): ?>
            <tr>
                <td><?= esc($d['kode_pengecekan']); ?></td>
                <td><?= esc($d['nama_customer']); ?></td>
                <td><?= esc($d['nama_teknisi']); ?></td>
                <td><?= esc($d['tanggal']); ?></td>
                <td>
                    <a href="<?php echo base_url('PengecekanController/show/' . esc($d['kode_pengecekan'])) ?>" class="btn icon btn-info" title="Detail pengecekan barang"><i data-feather="info"></i></a>

                    <button type="button" class="btn icon btn-danger" title="Hapus data" data-bs-toggle="modal" data-bs-target="#modalHapusCustomer<?= esc($d['kode_pengecekan']); ?>">
                        <i data-feather="trash"></i></button>
                    <!--Danger theme Modal -->
                    <div class="modal fade text-left" id="modalHapusCustomer<?= esc($d['kode_pengecekan']); ?>" tabindex="-1"
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
                                Hapus Data Pengecekan
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
                            Anda yakin ingin menghapus data pengecekan ini?
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
                            <form action="/PengecekanController/delete_pengecekan/<?= esc($d['kode_pengecekan']); ?>" method="post">
                            <?php csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                                <button
                                    type="submit"
                                    class="btn btn-danger ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
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

    </section>
</div>

<?= $this->endSection() ?>

