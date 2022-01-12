<footer class="main-footer">

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
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
$(function() {
    var sum = 0;

    $(".price").each(function() {
        sum += parseFloat($(this).text());


    });
    $('#total').text(`Rp. ${sum.toLocaleString("id","ID")}`);





})


$(document).ready(function() {
    //set initial state.
    $('#cekidot').val(this.checked);

    $('#cekidot').change(function() {
        if (this.checked) {
            var returnVal = confirm("Are you sure?");
            $(this).prop("checked", returnVal);
        }
        $('#cekidot').val(this.checked);
    });
});



$(function() {
    $('.list li').click(function() {
        $('.list li.active').removeClass('active');
        $(this).addClass('active');
    });
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

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>

</script>
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
<script src="<?php echo base_url('assets/assets_stisla/'); ?>assets/js/page/index.js"></script>
<script src="<?php echo base_url('assets/assets_stisla/'); ?>js/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url('node_modules/nicescroll/'); ?>jquery.nicescroll.js"></script>
<!-- <script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script> -->
<script>
var timeout = 3000; // in miliseconds (3*1000)

$('.alert').delay(timeout).fadeOut(300);
</script>

<script>
/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

'use strict';

</script>
<script src="<?php echo base_url('assets/assets_stisla/js/myscript.js')?>"></script>
</body>

</html>
