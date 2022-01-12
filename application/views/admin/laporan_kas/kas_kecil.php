<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kas Kecil</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title"> Kas Kecil</h2>


            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">


                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Kas Kecil</h3>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col my-3">
                                <form action="<?= base_url('laporan/cetak') ?>" method="post" class="d-flex flex-row justify-content-center">
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
                                        <button class="btn btn-success" type="submit">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
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
                                    <td scope="col"><?=$i?></td>
                                    <td scope="col"><?= bulan($bulan).' '.$tahun ?></td>
                                    <td scope="col">
                                        <?= form_open('laporan/cetak','',['bulan'=>$bulan,'tahun'=>$tahun]) ?>
                                        <?= form_button(['type'=>'submit','content'=>'Cetak Laporan','class'=>'btn btn-success mr-3']) ?>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                                <?php
                    endforeach;
                  ?>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>

        </div>
</div>
</section>

</div>
