<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Pemintaan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Data Pemohon Kas Kecil</h5>
                                <div class="form-group">
                                    <label for="nama">Nama Induk Pegawai</label>
                                    <input type="text" name="nip" class="form-control" value="<?= $pegawai['nip']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_pemohon'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pemohon</label>
                                    <input type="text" name="nama_pemohon" class="form-control" value="<?= $pegawai['nama']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_pemohon'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Divisi</label>
                                    <input type="text" name="nama_divisi" class="form-control" value="<?= $pegawai['nama_divisi']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_divisi'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Jabatan</label>
                                    <input type="text" name="nama_jabatan" class="form-control" value="<?= $pegawai['nama_jabatan']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_jabatan'); ?></small>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Permintaan Kas Kecil</h5>
                            <div class="form-group">
                                <label for="nip">Kode Permintaan</label>
                                <input type="text" name="kode_permintaan" class="form-control" value="<?= $kode ?>" readonly>
                                <small class="muted text-danger"><?= form_error('nip'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="role">Tanggal Permintaan</label>
                                <input type="date" name="tgl_permintaan" value="<?=set_value('tgl_permintaan')?>" class="form-control">
                                <small class="muted text-danger"><?= form_error('tgl_permintaan'); ?></small>
                            </div>

                            <div class="form-group">
                                <label for="telepon">Nominal</label>
                                <input type="number" name="nominal" class="form-control" value="<?= set_value('nominal'); ?>">
                                <small class="muted text-danger"><?= form_error('nominal'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" value="<?= set_value('keperluan'); ?>">
                                <small class="muted text-danger"><?= form_error('keperluan'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>">
                                <small class="muted text-danger"><?= form_error('keterangan'); ?></small>
                            </div>




                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
    </section>

</div>
