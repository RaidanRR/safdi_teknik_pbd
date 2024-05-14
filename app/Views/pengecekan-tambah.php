<?= $this->extend('template') ?>

<?= $this->section('pengecekan_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($validasi->hasError('id_customer')||$validasi->hasError('kode_pengecekan')||$validasi->hasError('id_teknisi')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <?= $validasi->listErrors() ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah pengecekan</h3>
            <p class="text-subtitle text-muted">
            Berikut ditampilkan form tambah pengecekan
            </p>
        </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        <div class="card-header float-start">
            <!-- <h4 class="card-title">Horizontal Form</h4> -->
        </div>
        <div class="card-body">
        <form class="form form-horizontal" action="/tambah-pengecekan" method="POST">
            <div class="form-body">
                <div class="row">
                <div class="col-md-4">
                    <label>ID Pengecekan</label>
                </div>
                <div class="col-md-8 form-group">
                    <input required min="1" autofocus required maxlength="5"
                    type="number"
                    class="form-control"
                    name="kode_pengecekan"
                    placeholder="id pengecekan"
                    />
                </div>
                <div class="col-md-4">
                    <label>Nama Pelanggan</label>
                </div>
                <div class="col-md-8 form-group">
                    <select class="choices form-select" name="id_customer" required>
                    <?php foreach($customer as $c): ?>
                    <option value="<?= esc($c['id_customer']); ?>"><?= esc($c['id_customer']); ?> - <?= esc($c['nama']); ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Nama Teknisi</label>
                </div>
                <div class="col-md-8 form-group">
                    <select class="choices form-select" name="id_teknisi" required>
                    <?php foreach($teknisi as $c): ?>
                    <option value="<?= esc($c['id_teknisi']); ?>"><?= esc($c['id_teknisi']); ?> - <?= esc($c['nama']); ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <!-- <div class="col-md-4">
                    <label>Tanggal</label>
                </div>
                <div class="col-md-8 form-group">
                    <input
                    type="date"
                    class="form-control"
                    name="tanggal"
                    />
                </div> -->
                <br><br>
                <div class="col-sm-12 d-flex justify-content-end">
                    <button
                    type="submit"
                    class="btn btn-primary me-1 mb-1"
                    >
                    Tambah
                    </button>
                </div>
                </div>
            </div>
        </form>

        </div>
        </div>

    </section>
</div>

<?= $this->endSection() ?>

