<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Jurusan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Tambah Data Jurusan</h2>

            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_type">Nama Jurusan</label>
                                    <input type="text" name="nama_jurusan" class="form-control" value="<?= set_value('nama_jurusan'); ?>">
                                    <small class="muted text-danger"><?= form_error('nama_jurusan'); ?></small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Simpan</button>
                                    <button type="reset" class="btn btn-outline-danger"><i class="fas fa-reset"></i> Reset Input</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
