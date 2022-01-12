<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Kas Kecil</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Formulir Tambah Data Kas Kecil</h2>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url($action) ?>" method="post">
                                <?php 
                    if(!empty($id)):
                  ?>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="datepicker">Tanggal</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" id="datepicker" name="tgl_transaksi" value="<?= $data->tgl_transaksi ?>">
                                        </div>
                                        <?= form_error('tgl_transaksi') ?>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="no_reff">Nama Akun</label>
                                        <?=form_dropdown('no_reff',getDropdownList('akun',['no_reff','nama_reff']),$data->no_reff,['class'=>'form-control','id'=>'no_reff']);?>
                                        <?= form_error('no_reff') ?>
                                    </div>
                                    <div class="col" hidden>
                                        <label for="reff">No. Reff</label>
                                        <input type="text" name="reff" class="form-control" id="reff" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="jenis_saldo">Jenis Saldo</label>
                                        <?=form_dropdown('jenis_saldo',['debit'=>'Debit','kredit'=>'Kredit'],$data->jenis_saldo,['class'=>'form-control jenis_saldo','id'=>'jenis_saldo']);?>
                                        <?= form_error('jenis_saldo') ?>
                                    </div>
                                    <div class="col">
                                        <label for="saldo">Saldo</label>
                                        <input type="text" name="saldo" class="form-control saldo" id="saldo" value="<?= $data->saldo ?>">
                                        <?= form_error('saldo') ?>
                                    </div>
                                </div>
                                <div class="col-12" id="form_jurnal_prepend">
                                    <button class="btn btn-primary" type="submit" id="button_jurnal">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>
