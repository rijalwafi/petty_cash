<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $judul; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?= base_url("assets/img/logo_pt/logo-pt.png")?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/components.css">
    <script src="<?= base_url('assets/ckeditor'); ?>/ckeditor.js"></script>

</head>




<body class="container-fluid bg-secondary">
    <div id="app" class="">


        <div class="row bg-danger min-vh-100">
            <div class="col bg-light min-vh-100">
                <div class="login-brand mt-5">
                    <h3>PT.SEJAHTERA SUMBER BARU TRADA </h3>
                    <img src="<?= base_url("/assets/img/logo_pt/logo-pt.png")?>" alt="">
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <p class="text-center">Moto Perusahaan </p>
                            <h4 class="text-center">" Yaruki Sampai Tajir "</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <p> Misi :</p>
                        <article>
                            Mengembangkan profesionalisme yang berkesinambungan demi komitmen kami untuk memberikan kontribusi terbaik untuk para
                            pelanggan Suzuki.
                        </article>
                    </div>
                    <div class="col-6">
                        <p>Misi :</p>
                        <article>
                            Pelayanan profesional dibidang pemasaran produk dan jasa pelayanan purna jual menjadi komitmen utama kami.
                        </article>
                    </div>
                </div>

            </div>
            <div class="col min-vh-100 bg-secondary " style="height: 100%;">
                <div class="login-brand">

                </div>
                <center>
                    <div class="card " style="width: 22rem;height:25rem;margin-top:200px">
                        <div class="card-header bg-danger">
                            <h4 class="text-light text-center">Silakan Login</h4>
                        </div>
                        <div class="card-body">

                            <?= $this->session->flashdata('pesan'); ?>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus>
                                    <small class="muted text-danger"><?= form_error('username'); ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                    <small class="muted text-danger"><?= form_error('password'); ?></small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-danger btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </center>


                <!-- <div class="mt-5 text-muted text-center">
                            Belum punya akun? <a href="<?=base_url('auth/daftar')?>"></a>
                        </div> -->

            </div>





            <!-- <div class="mt-5 text-muted text-center">
                            Belum punya akun? <a href="<?=base_url('auth/daftar')?>"></a>
                        </div> -->






            <footer>

            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    // $(function() {
    //     var total = 0;
    //     $(" #table1 tr").each(function() {
    //         let price = $(this).find('td').eq(8).html();
    //         // total += parseInt(price)
    //         total = price
    //     });
    //     // $("#total").val(total)
    //     alert(price)
    // })
    // var table = document.getElementById('table1'),
    //     rows = table.getElementsByTagName('tr'),
    //     i, j, cells, customerId, total = 0;

    // for (i = 0, j = rows.length; i < j; ++i) {
    //     cells = rows[i].getElementsByTagName('td');
    //     if (!cells.length) {
    //         continue;
    //     }
    //     total = parseFloat(total + cells[7]);
    //     alert(total)

    // }
    $(function() {
        var sum = 0;

        $(".price").each(function() {
            sum += parseFloat($(this).text());


        });
        $('#total').text(`Rp. ${sum.toLocaleString("id","ID")}`);





    })









    // $(document).ready(function() {
    //     $('table1 th').each(function() {
    //         $(this).find("td .price").each(function() {
    //             alert($(this).html());
    //         })
    //     });
    // });

    // function calculateColumn(index) {
    //     var total = 0;
    //     $('table tr').each(function() {
    //         var value = parseInt($('td', this).eq().text());
    //         if (!isNaN(value)) {
    //             total += value;
    //         }
    //     });
    //     $('table td').eq(index).text('Total: ' + total);
    //     console.log(total)
    // }


    // var table = document.getElementById("table1"),
    // var price =document.getElementsByClassName('.price');
    // for (var i = 1; i < table.rows.length; i++) {
    //     sumVal = sumVal + (table.rows[i].cells[7]).;
    // }

    // document.getElementById("#total").innerHTML = "SubTotal =" + sumVal;
    // console.log(sumVal);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
    Morris.Bar({
        element: 'myfirstchart',
        data: <?php echo $grafik;?>,
        xkey: 'tgl_penggembalian',
        ykeys: ['total_bayar', 'harga', 'total_denda'],
        labels: ['Total Bayar', 'Harga Sewa', 'Total Denda']
    });


    // $(function() {
    //     $("#total").html(sumColumn(7));
    // })

    // function sumColumn(index) {
    //     let total = 0
    //     $("td:nth-child(" + index + ")").each(function() {
    //         total += parseInt($(this).text());
    //     })
    //     return total;
    // }
    </script>

    <script src="<?php echo base_url('assets/assets_stisla/'); ?>assets/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/assets_stisla/'); ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url('assets/assets_stisla/'); ?>assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo base_url('assets/assets_stisla/'); ?>assets/js/page/index-0.js"></script>
    <script src="<?php echo base_url('assets/assets_stisla'); ?>/js/jquery-3.5.1.min.js"></script>
    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script>
    var timeout = 3000; // in miliseconds (3*1000)

    $('.alert').delay(timeout).fadeOut(300);
    </script>

    <script src="<?= base_url('assets/assets_stisla'); ?>/js/myscript.js"></script>
</body>

</html>
