<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data akun</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Tambah Data akun</h2>

            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                            </div>
                            <div class="form-group">
                                <label for="kode_type">Kode Reff</label>
                                <input type="text" name="no_reff" class="form-control" value="<?= set_value('no_reff'); ?>">
                                <small class="muted text-danger"><?= form_error('no_reff'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="kode_type">Nama Reff</label>
                                <input type="text" name="nama_reff" class="form-control" value="<?= set_value('nama_reff'); ?>">
                                <small class="muted text-danger"><?= form_error('nama_reff'); ?></small>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?= set_value('kode_reff'); ?>">
                                    <small class="muted text-danger"><?= form_error('keterangan'); ?></small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Simpan</button>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
