<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?=$sub_judul?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Edit Data Kas</h2>
            <p class="section-lead">Input Data Pengeluaran atau Pemasukan Kas.</p>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <input type="text" name="id" value="<?= $kas['id_kas']; ?>" hidden>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl_dibuat">Masukan Tanggal</label>
                                    <input type="date" name="tgl_dibuat" id="tgl_dibuat" value="<?=$kas['tgl_dibuat']?>" class="form-control">
                                    <small class="muted text-danger">
                                        <?= form_error('tgl_dibuat')?>
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kas">Pilih Jenis Kas</label>
                                    <select name="jenis_kas" id="jenis_kas" class="form-control">
                                        <option value="" readonly>Pilih Jenis Kas</option>
                                        <option value="pemasukan">Pemasukan</option>
                                        <option value="pengeluaran">Pengeluaran</option>
                                    </select>
                                    <small class="muted text-danger">
                                        <?= form_error('jenis_kas')?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" rows="3"><?=$kas['keterangan']?></textarea>
                                    <small class="mute text-danger">
                                        <?= form_error('keterangan') ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="number" class="form-control" name="nominal" id="nominal"
                                        value="<?=$kas['kas_masuk']==null? $kas['kas_keluar'] : $kas['kas_masuk']?>">
                                    <small class="muted text-danger">
                                        <?=form_error('nominal'); ?>
                                    </small>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="kas_keluar">Pemasukan</label>
                                    <input type="text" name="kas_keluar" class="form-control" value="<?= $kas['kas_masuk']; ?>">
                                    <small class="muted text-danger"><?= form_error('kode_type'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_type">Pemasukan</label>
                                    <input type="text" name="kas_masuk" class="form-control" value="<?= $kas['kas_keluar']; ?>">
                                    <small class="muted text-danger"><?= form_error('nama_type'); ?></small>
                                </div> -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> <?=$tombol?></button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
