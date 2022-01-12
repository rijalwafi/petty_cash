<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data akun</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Edit Data akun</h2>

            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <input type="number" name="no_reff" value="<?=$divisi['no_reff']?> " hidden>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_type">Nomer Reff</label>
                                    <input type="text" name="no_reff" class="form-control" value="<?=$divisi['no_reff'] ?>">
                                    <small class="muted text-danger"><?= form_error('no_reff'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="kode_type">Nama akun</label>
                                    <input type="text" name="nama_reff" class="form-control" value="<?=$divisi['nama_reff'] ?>">
                                    <small class="muted text-danger"><?= form_error('nama_reff'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="kode_type">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?=$divisi['keterangan'] ?>">
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
