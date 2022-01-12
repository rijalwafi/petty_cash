<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-grip-horizontal"></i> <?=$judul_data?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Semua Data <?=$judul_data?></h2>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4><?=$judul_card?></h4>
                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="row">

                        </div>
                        <!-- Kolom Pencarian -->
                        <div class="row">
                            <div class="col-md-4 ml-4">
                                <a href="<?= base_url('jurnal_umum/tambah') ?>" class="btn btn-primary mt-2">Input Kas Kecil</a>
                            </div>
                            <div class="col-md-4 ml-4">
                                <form action="<?= base_url('jurnal_umum/detail') ?>" method="post" class="d-flex flex-row justify-content-end">
                                    <div class="form-group">
                                        <select name="bulan" id="bulan" class="form-control">
                                            <?php
                            for($i=1;$i<=12;$i++){
                              echo "<option value=$i>".bulan($i)."</option>";
                            }
                          ?>
                                        </select>
                                    </div>
                                    <div class="form-group mx-3">
                                        <select name="tahun" id="tahun" class="form-control">
                                            <?php 
                            foreach($tahun as $row){
                              $tahuns = date('Y',strtotime($row->tgl_transaksi));
                              echo "<option value=$tahuns>".$tahuns."</option>";
                            }
                          ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Bulan Dan Tahun</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach($listJurnal as $row):
                    $i++;
                    $bulan = date('m',strtotime($row->tgl_transaksi));
                    $tahun = date('Y',strtotime($row->tgl_transaksi));
                  ?>
                                    <tr>
                                        <td scope="col"><?= ++$start?></td>
                                        <td scope="col"><?= bulan($bulan).' '.$tahun ?></td>
                                        <td scope="col">
                                            <?= form_open('jurnal_umum/detail','',['bulan'=>$bulan,'tahun'=>$tahun]) ?>
                                            <?= form_button(['type'=>'submit','content'=>'Lihat Jurnal','class'=>'btn btn-success mr-3']) ?>
                                            <?= form_close() ?>
                                        </td>
                                    </tr>
                                    <?php
                    endforeach;
                  ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <!-- <?php echo $this->pagination->create_links(); ?> -->
                            <!-- <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
