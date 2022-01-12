<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Jurusan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Edit Data Jurusan</h2>

            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <input type="number" name="id_jurusan" value="<?=$jurusan['id_jurusan']?> " hidden>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_type">Nama Jurusan</label>
                                    <input type="text" name="nama_jurusan" class="form-control" value="<?=$jurusan['nama_jurusan'] ?>">
                                    <small class="muted text-danger"><?= form_error('nama_jurusan'); ?></small>
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
