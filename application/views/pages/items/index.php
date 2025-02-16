<div class="container-fluid">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Filter -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="d-inline text-dark">Filter satuan&nbsp;&#8594;&nbsp;</h5>
                            <span>
                                <a href="<?= base_url('items') ?>" class="btn btn-dark mt-1 mb-1">Semua</a>
                                <?php foreach (getUnits() as $unit) : ?>
                                    <a href="<?= base_url('items/unit/' . $unit->id) ?>" class="btn btn-primary mt-1 mb-1"><?= ucfirst($unit->nama) ?></a>
                                <?php endforeach ?>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="d-inline text-dark">Filter ketersediaan&nbsp;&#8594;&nbsp;</h5>
                            <span>
                                <a href="<?= base_url('items/availability/available') ?>" class="btn btn-success mt-1 mb-1">Ada</a>
                                <a href="<?= base_url('items/availability/empty') ?>" class="btn btn-danger mt-1 mb-1">Kosong</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Stok Barang -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Barang</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Supplier</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th width=15%>Masuk</th>
                                    <th width=15%>Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><?= $row->qty . ' ' . ucfirst($row->nama_satuan) ?></td>
                                        <td><?= $row->nama_supplier ?></td>
                                        <td>
                                            <span class="badge badge-<?= $row->qty > 0 ? 'success' : 'danger' ?>">
                                                <?= $row->qty > 0 ? 'Tersedia' : 'Kosong' ?>
                                            </span>
                                        </td>
                                        
                                        <!-- Input harga manual -->
                                        <td>
                                            <input type="number" name="harga" min="1" class="form-control" form="form-masuk-<?= $row->id_barang ?>" placeholder="Input harga">
                                        </td>

                                        <!-- Form untuk Masuk -->
                                        <td>
                                            <form id="form-masuk-<?= $row->id_barang ?>" action="<?= base_url('cartin/add') ?>" method="POST">
                                                <input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
                                                <div class="input-group">
                                                    <input type="number" name="qty_masuk" min="1" class="form-control" placeholder="Qty Masuk">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit">In</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>

                                        <!-- Form untuk Keluar -->
                                        <td>
                                            <form id="form-keluar-<?= $row->id_barang ?>" action="<?= base_url('cartout/add') ?>" method="POST">
                                                <input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
                                                <div class="input-group">
                                                    <input type="number" name="qty_keluar" min="1" max="<?= $row->qty ?>" class="form-control" placeholder="Qty Keluar">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger" type="submit">Out</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <?= $pagination ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
