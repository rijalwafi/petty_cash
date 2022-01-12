<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-users"></i> Data Pegawai</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="<?= base_url('admin/pegawai/tambahPegawai'); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data
                        Pegawai</a>
                    <div class="card">
                        <div class="card-header">
                            <h4>Pegawai</h4>
                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="row">
                            <div class="col-md-4 ml-4">
                                <form action="<?= base_url('admin/pegawai'); ?>" method="post">
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
                            <h6 class="text-muted">Total <?= $total_rows; ?> Customer</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>role</th>
                                        <th>Nama</th>
                                        <th>divisi</th>
                                        <th>Jabatan</th>

                                        <th>username</th>

                                        <th>Aksi</th>
                                    </tr>
                                    <?php if(empty($pegawai)) : ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-danger text-center" role="alert">Data Tidak Ditemukan.</div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php $no = 1; foreach($data_pegawai as $c) : ?>
                                    <tr>
                                        <td><?= ++$start; ?></td>
                                        <td><?=$c['nip']?></td>
                                        <td><?=$c['nama_role']?></td>
                                        <td><?= $c['nama']; ?></td>
                                        <td><?= $c['nama_divisi']; ?></td>
                                        <td><?= $c['nama_jabatan']?></td>
                                        <td><?= $c['username']; ?></td>

                                        <td>
                                            <?php if($this->session->userdata('nama_divisi')=='Human Resource'): ?>
                                            <a href="<?= base_url('admin/pegawai/edit/') . $c['id_pegawai']; ?>" class="btn btn-success"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/pegawai/hapus/') . $c['id_pegawai']; ?>" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a>
                                            <?php endif ;?>

                                            <a href="<?= base_url('admin/pegawai/edit/') . $c['id_pegawai']; ?>" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
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
