<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Customer</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">Pilih Role</label>
                                    <select name="id_role" id="id_role" class="form-control">
                                        <option value="">Pilih</option>

                                        <?php foreach($role as $d): ?>
                                        <option value="<?=$d['id_role']?>"><?=$d['nama_role']?></option>
                                        <?php endforeach?>
                                    </select>
                                    <small class="muted text-danger"><?= form_error('id_role'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nip">Nomer Induk Pegawai</label>
                                    <input type="text" name="nip" class="form-control" value="<?=$nip?>">
                                    <small class="muted text-danger"><?= form_error('nip'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                                    <small class="muted text-danger"><?= form_error('username'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
                                    <small class="muted text-danger"><?= form_error('password'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    <small class="muted text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="SMK">SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                    <small class="muted text-danger"><?= form_error('pendidikan'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select name="id_jurusan" id="jurusan" class="form-control">
                                        <option value="">Pilih</option>

                                        <?php foreach($jurusan as $d): ?>
                                        <option value="<?=$d['id_jurusan']?>"><?=$d['nama_jurusan']?></option>
                                        <?php endforeach?>
                                    </select>
                                    <small class="muted text-danger"><?= form_error('nama_jurusan'); ?></small>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kelamin" class="d-block">Jelamin Kelamin</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jk" name="jk" value="L">
                                        <label class="form-check-label" for="jk">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jk" name="jk" value="P">
                                        <label class="form-check-label" for="jk">Perempuan</label>
                                    </div>
                                </div>
                                <small class="muted text-danger"><?= form_error('kelamin'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="<?= set_value('telepon'); ?>">
                                <small class="muted text-danger"><?= form_error('telepon'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="ktp">No.KTP</label>
                                <input type="text" name="ktp" class="form-control" value="<?= set_value('ktp'); ?>">
                                <small class="muted text-danger"><?= form_error('ktp'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="divisi">divisi</label>
                                <select name="id_divisi" id="divisi" class="form-control">
                                    <option value="">Pilih</option>

                                    <?php foreach($divisi as $d): ?>
                                    <option value="<?=$d['id_divisi']?>"><?=$d['nama_divisi']?></option>
                                    <?php endforeach?>
                                </select>
                                <small class="muted text-danger"><?= form_error('divisi'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="id_jabatan" id="jabatan" class="form-control">
                                    <option value="">Pilih</option>

                                    <?php foreach($jabatan as $d): ?>
                                    <option value="<?=$d['id_jabatan']?>"><?=$d['nama_jabatan']?></option>
                                    <?php endforeach?>
                                </select>
                                <small class="muted text-danger"><?= form_error('jabatan'); ?></small>
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
