<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-university"></i> <?= $judul; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="<?= base_url('admin/kas/tambahkas'); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> <?=$tombol_tambah?></a>

                    <div class="card">
                        <div class="card-header">
                            <h4>Kas</h4>
                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="row">
                            <div class="col-md-4 ml-4">

                                <form action="<?= base_url('admin/bank'); ?>" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukan Keyword..." name="keyword" autocomplete="off"
                                            autofocus="on">
                                        <div class="input-group-append">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Cari">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php if(empty($kas)) : ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-danger text-center" role="alert">Data Kosong.</div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php 
                                    $no= 1; 
                                 
                                   
                                   
                                  
                                    ?>
                                    <?php foreach($kas as $b) : ?>

                                    <tr>
                                        <td><?= $no++ ; ?></td>
                                        <td><?=$b['tgl_dibuat']?></td>
                                        <td><?=$b['jenis_kas']?></td>
                                        <td><?=$b['keterangan']?></td>

                                        <td>Rp. <?=$b['jenis_kas']=='pemasukan'?number_format($b['kas_masuk'],0,',',','): '' ?></td>
                                        <td>Rp. <?=$b['jenis_kas']=='pengeluaran'?number_format($b['kas_keluar'],0,',',','): '' ?></td>
                                        <td>Rp. <?=number_format($b['balance'],0,',',',')?></td>


                                        <td>

                                            <a href="<?= base_url('admin/kas/hapuskas/') . $b['id_kas']; ?>" class="btn btn-danger"
                                                onclick="return confirm('Yakin ?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>

<div class="modal fade" id="formModalKas" tabindex="-1" aria-labelledby="formBankModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formBankModalLabel">Tambah Data Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_kas" id="id_kas">
                    <div class="form-group">
                        <label for="nama">Nama Bank</label>
                        <input type="number" name="kas_keluar" id="kas_keluar" class="form-control">
                        <small class="muted text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="no">No.Rekening</label>
                        <input type="number" name="kas_masuk" id="kas_masuk" class="form-control">
                        <small class="muted text-danger"><?= form_error('no'); ?></small>
                    </div>
                    <div class="form-group tombolUbah">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
