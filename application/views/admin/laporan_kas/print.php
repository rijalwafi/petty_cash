<div class="container mt-4">
    <h2 class="text-center">PT.SEJAHTERA SUMBER BARU TRADA</h2>
    <h4 class="text-center">LAPORAN KAS</h4>
    <table align="center">
        <tr>
            <td>Dari Tanggal</td>
            <td>:</td>
            <td><?= date('d-M-Y', strtotime($_GET['dari'])); ?></td>
        </tr>
        <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td><?= date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
        </tr>

        <tr>
            <td>Kas Masuk</td>
            <td>:</td>
            <?php foreach ($total as $to): ?>
            <td><strong>Rp. <?=number_format($to['debit'],0,',',',')?></strong></td>

        </tr>
        <tr>
            <td>Kas Keluar</td>
            <td>:</td>
            <td><strong>Rp. <?=number_format($to['kredit'],0,',',',')?></strong></td>
        </tr>
        <tr>
            <td>Saldo</td>
            <td>:</td>
            <td><strong>Rp. <?=number_format($to['total'],0,',',',')?></strong></td>
        </tr>
        <?php endforeach?>
    </table>

    <div class="table-responsive">
        <table class="table table-bordered table-md" id="table1">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Jenis Kas</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo </th>

                <!-- <th>Status Pengembalian</th>
                <th>Status Rental</th> -->

            </tr>
            <?php $no = 1; foreach($laporan as $l) : ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d/M/Y', strtotime($l['tgl_dibuat'])); ?></td>
                <td><?= $l['jenis_kas']; ?></td>
                <td><?= $l['keterangan']; ?></td>
                <td>Rp. <?=$l['jenis_kas']=='pemasukan'?number_format($l['kas_masuk'],0,',',','): '' ?></td>
                <td>Rp. <?=$l['jenis_kas']=='pengeluaran'?number_format($l['kas_keluar'],0,',',','): '' ?></td>
                <td>Rp. <?=number_format($l['balance'],0,',',',')?></td>




            </tr>

            <?php endforeach; ?>



            <?php if(empty($laporan)) : ?>

            <tr>
                <td colspan="11">
                    <div class="alert alert-danger" role="alert">Laporan Kas Dari
                        <strong><?= date('d-m-Y', strtotime(set_value('dari'))); ?></strong> Dan Sampai
                        <strong><?= date('d-m-Y', strtotime(set_value('sampai'))); ?></strong> Tidak Di Temukan.
                    </div>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <?php 
                    $date=date('d F Y');
                ?>
                <td colspan="2">
                    <center>Bekasi, <?=$date?> <br>
                        Divisi <?= $pegawai['nama_divisi']?></center>
                </td>
            </tr>
            <tr>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td colspan="7"></td>
            </tr>

            <tr>
                <td colspan="5"></td>
                <?php 
                    $date=date('d F Y');
                ?>
                <td colspan="2">
                    <center><?=$pegawai['nama'] ?></center>
                </td>
            </tr>
        </table>
    </div>
</div>

<script>
window.print();
</script>
