<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
            <a href="/">
                SafdiTeknik
            </a>
            </div>
            <div class="sidebar-toggler x">
            <a href="#" class="sidebar-hide d-xl-none d-block">
                <i class="bi bi-x bi-middle"></i>
            </a>
            </div>
        </div>
        </div>
        <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item <?= $this->renderSection('pengecekan_active') ?>">
            <a href="/pengecekan" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Pengecekan</span>
            </a>
            </li>

            <li class="sidebar-item <?= $this->renderSection('data_barang_active') ?>">
            <a href="/barang" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Data Barang</span>
            </a>
            </li>

            <li class="sidebar-item <?= $this->renderSection('customer_active') ?>">
            <a href="/customer" class="sidebar-link">
                <i class="bi bi-stack"></i>
                <span>Pelanggan</span>
            </a>
            </li>
            
            <li class="sidebar-item <?= $this->renderSection('teknisi_active') ?>">
                <a href="/teknisi" class="sidebar-link">
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Teknisi</span>
                </a>
            </li>


        </ul>
        </div>
    </div>
</div>