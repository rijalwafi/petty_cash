<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-users"></i> Data Permintaan Kas Kecil</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="<?= base_url('admin/permintaan/tambah'); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h4>Permintaan Kas Kecil</h4>
                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="row">
                            <div class="col-md-4 ml-4">
                                <form action="<?= base_url('admin/permintaan'); ?>" method="post">
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
                            <h6 class="text-muted">Total <?= $total_rows; ?> Permintaan</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>tanggal</th>
                                        <th>Kode Permintaan</th>
                                        <th>Divisi</th>
                                        <th>Nama Pemohon</th>
                                        <td>Nominal</td>
                                        <td>Status</td>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php if(empty($pegawai)) : ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-danger text-center" role="alert">Data Tidak Ditemukan.</div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php $no = 1; foreach($permintaan as $c) : ?>
                                    <tr>
                                        <td><?= ++$start; ?></td>
                                        <td><?=$c['tgl_permintaan']?></td>
                                        <td><?= $c['kode_permintaan']?></td>
                                        <td><?= $c['nama_divisi']?></td>

                                        <td><?= $c['nama_pemohon']; ?></td>
                                        <td><?= $c['nominal']; ?></td>
                                        <?php if($c['status']==null): ?>
                                        <td><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                                        <?php elseif($c['status']==0):?>
                                        <td><span class="badge badge-danger">Permintaan Ditolak</span></td>
                                        <?php else :?>
                                        <td><span class="badge badge-success">Permintaan Disetujui</span></td>
                                        <?php endif?>


                                        <td>
                                            <?php if($pegawai['role_id']==1) :?>


                                            <a href="<?= base_url('admin/permintaan/detail/') . $c['id_permintaan']; ?>" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>

                                            <?php elseif($pegawai['nama_divisi']=='Accounting'):?>


                                            <a href="<?= base_url('admin/permintaan/detail/') . $c['id_permintaan']; ?>" class="btn btn-success"
                                                data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('admin/permintaan/edit/') . $c['id_permintaan']; ?>" class="btn btn-warning">
                                                <i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/permintaan/hapus/') . $c['id_permintaan']; ?>" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a>


                                            <?php elseif($pegawai['nama_role']=='kepala_divisi'):?>

                                            <a href="<?= base_url('admin/permintaan/detail/') . $c['id_permintaan']; ?>" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>

                                            <?php endif?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>
