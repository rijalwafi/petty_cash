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

                            <input type="text" name="nama_role" value="<?=$pegawai['nama_role']?>" hidden>
                            <input type="text" name="id_permintaan" value="<?=$permintaan['id_permintaan']?>" hidden>
                            <input type="text" name="nama" value="<?=$pegawai['nama']?>" hidden>
                            <input type="text" name="divisi" value="<?=$pegawai['nama_divisi']?>" hidden>
                            <input type="text" name="jabatan" value="<?=$pegawai['nama_jabatan']?>" hidden>

                            <?php if($pegawai['nama_role']=='kepala_cabang') :?>
                            <div class="form-group">
                                <label for="kacab" class="d-block">Acc Kepala Cabang</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="kacab" name="status" value="0"
                                            <?=$detail['status_konfirmasi']==0?'checked':'';?>>
                                        <label class="form-check-label" for="kacab">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="kacab" name="status" value="1"
                                            <?=$detail['status_konfirmasi']==1?'checked':'';?>>
                                        <label class="form-check-label" for="kacab">Accept</label>
                                    </div>
                                </div>
                                <small class="muted text-danger"><?= form_error('kelamin'); ?></small>
                            </div>


                            <?php elseif($pegawai['nama_role']=='accounting'): ?>

                            <div class="form-group">
                                <label for="kadiv" class="d-block">Acc Divisi Accounting</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="accounting" name="status" value="0">
                                        <label class="form-check-label" for="kadiv">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="kadiv" name="status" value="1">
                                        <label class="form-check-label" for="kadiv">Accept</label>
                                    </div>
                                </div>
                                <small class="muted text-danger"><?= form_error('kelamin'); ?></small>
                            </div>
                            <?php elseif($pegawai['nama_role']=='kepala_divisi'):?>
                            <div class="form-group">
                                <label for="kadiv" class="d-block">Acc Kepala divisi</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="accounting" name="status" value="0" <?php  ?>>
                                        <label class="form-check-label" for="kadiv">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="kadiv" name="status" value="1">
                                        <label class="form-check-label" for="kadiv">Accept</label>
                                    </div>
                                </div>
                                <small class="muted text-danger"><?= form_error('kelamin'); ?></small>
                            </div>

                            <?php else : ?>
                            <div class="form-group">
                                <h2></h2>
                            </div>
                            <?php endif?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <?php if($total_row==3):?>
                <div class="btn btn-outline-success">Konfirmasi Selesai</div>
                <?php elseif($total_row<=2):?>
                <div class="btn btn-outline-warning">Menunggu Konfirmasi</div>

                <?php endif?>
                <?php if($status==3 ): ?>
                <div class="btn btn-outline-success">Permintaan Disetujui</div>
                <?php elseif($status<=2 && $total_row<=2 ): ?>
                <div class="btn btn-outline-warning">Menunggu Konfirmasi</div>
                <?php else : ?>
                <div class="btn btn-outline-danger">Pemintaan Ditolak</div>
                <?php endif ?>
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Kode Permintaan</th>
                        <th>Nama Role</th>
                        <th>Nama Konfirmator</th>
                        <th>Divisi</th>
                        <th>Jabatan</th>
                        <th>Tanggal Acc</th>
                        <th>status</th>


                    </tr>
                    <?php if(empty($detail_all)) : ?>
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger text-center" role="alert">Data Tidak Ditemukan.</div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php 
                    $no = 1;
                    foreach($detail_all as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['kode_permintaan']; ?></td>
                        <td><?= $t['nama_role']; ?></td>
                        <td><?= $t['nama']; ?></td>
                        <td><?= $t['divisi']; ?></td>
                        <td><?= $t['jabatan']; ?></td>
                        <td><?= $t['tgl_konfirmasi']; ?></td>
                        <td><?= $t['status_konfirmasi']==0?'<div class="btn btn-danger"><i class="fas fa-ban"></i></div>':'<div class="btn btn-success"><i class="fas fa-check"></i></div>'; ?>
                        </td>

                        <!-- <td>
                                            <a href="<?= base_url('admin/jurusan/edit/') . $t['id_jurusan']; ?>" class="btn btn-success"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/jurusan/hapus/') . $t['id_jurusan']; ?>" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a>
                                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                </table>

    </section>

</div>
