<?= $this->extend('template') ?>

<?= $this->section('pengecekan_active') ?>
active
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah barang yang akan di cek</h3>
            <p class="text-subtitle text-muted">
            Berikut ditampilkan form penambahan barang yang akan di cek
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
        <form class="form form-horizontal" action="/tambah-barang-pengecekan" method="post">
            <div class="form-body">
                <div class="row">
                <input type="hidden" name="kode_pengecekan" value="<?= esc($kode); ?>">
                <div class="col-md-4">
                    <label>Barang</label>
                </div>
                <div class="col-md-8 form-group">
                <select class="choices form-select" name="kode_barang">
                <?php foreach($barang as $c): ?>
                    <option value="<?= esc($c['kode_barang']); ?>"><?= esc($c['kode_barang']); ?> - <?= esc($c['nama_barang']); ?></option>
                <?php endforeach; ?>
                </select>
                </div>
                <div class="col-md-4">
                    <label>Keluhan</label>
                </div>
                <div class="col-md-8 form-group">
                    <input required
                    type="text"
                    class="form-control"
                    name="keluhan_barang"
                    placeholder="keluhan yang didapat terkait barang yang ditambahkan"
                    />
                </div>
                <div class="col-md-4">
                    <label>Jumlah</label>
                </div>
                <div class="col-md-8 form-group">
                    <input required
                    type="number" min="1"
                    id="contact-info"
                    class="form-control"
                    name="jumlah"
                    value="1"
                    placeholder="minimal 1"
                    />
                </div>
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

        <br>


        </div>
        </div>

    </section>
</div>

<?= $this->endSection() ?>