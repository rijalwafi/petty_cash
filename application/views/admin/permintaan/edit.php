<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Pemintaan</h1>
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
                                    <input type="text" name="nip" class="form-control" value="<?= $permintaan['nip']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_pemohon'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pemohon</label>
                                    <input type="text" name="nama_pemohon" class="form-control" value="<?= $permintaan['nama_pemohon']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_pemohon'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Divisi</label>
                                    <input type="text" name="nama_divisi" class="form-control" value="<?= $permintaan['nama_divisi']; ?>" readonly>
                                    <small class="muted text-danger"><?= form_error('nama_divisi'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Jabatan</label>
                                    <input type="text" name="nama_jabatan" class="form-control" value="<?= $permintaan['nama_jabatan']; ?>" readonly>
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
                                <input type="text" name="kode_permintaan" class="form-control" value="<?= $permintaan['kode_permintaan'] ?>" readonly>
                                <small class="muted text-danger"><?= form_error('nip'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="role">Tanggal Permintaan</label>
                                <input type="date" name="tgl_permintaan" value="<?=$permintaan['tgl_permintaan']?>" class="form-control" readonly>

                            </div>

                            <div class="form-group">
                                <label for="telepon">Nominal</label>
                                <input type="number" name="nominal" class="form-control" value="<?= $permintaan['nominal']?>" readonly>
                                <small class="muted text-danger"><?= form_error('nominal'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" value="<?= $permintaan['keperluan'] ?>" readonly>
                                <small class="muted text-danger"><?= form_error('keperluan'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="<?= $permintaan['keterangan'] ?>" readonly>
                                <small class="muted text-danger"><?= form_error('keterangan'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="kadiv" class="d-block">Acc Kasir</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="accounting" name="status" value="0"
                                            <?=$permintaan['status']==0?'checked':''?> <?=$permintaan['status']!=null?'disabled':''?>>
                                        <label class="form-check-label" for="kadiv">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="kadiv" name="status" value="1"
                                            <?=$permintaan['status']==1?'checked':''?> <?=$permintaan['nama_penerima']!=null?'disabled':''?>>
                                        <label class="form-check-label" for="kadiv">Accept</label>
                                    </div>
                                </div>
                                <small class="muted text-danger"><?= form_error('status'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control"
                                    value="<?= $permintaan['nama_penerima']!=null ? $permintaan['nama_penerima']:'' ?>"
                                    <?=$permintaan['nama_penerima']!=null?'disabled':''?>>
                                <small class="muted text-danger"><?= form_error('keterangan'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">Nama Penerima</label>
                                <input type="date" name="tgl_diterima" class="form-control"
                                    value="<?= $permintaan['tgl_diterima']!=null ? $permintaan['tgl_diterima']:'' ?>"
                                    <?=$permintaan['tgl_diterima']!=null?'disabled':''?>>
                                <small class="muted text-danger"><?= form_error('keterangan'); ?></small>
                            </div>




                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" <?=$permintaan['tgl_diterima']!=null?'disabled':''?>><i
                                        class="fas fa-plus"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


    </section>

</div>
