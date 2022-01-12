$(function () {
  // ------------------HALAMAN ARTIKEL ------------------
  $('.tombolTambahArtikel').on('click', function () {
    // mengubah judul tambah artikel yang di timpa di bawah
    $('#formArtikelModalLabel').html('Tambah Data Artikel');
    $('.modal-footer button[type=submit]').html('Tambah Data');

    $('#judul').val('');
    $('#kategori').val('');
    $('#deskripsi').val('');
    $('#foto').val('');
    $('#id_berita').val('');
    $('#inputfoto').val('');
    $('#foto').val('');
  });

  $('.formModalUbah').on('click', function () {
    // mengubah judul tambah artikel menjadi ubah artikel
    $('#formArtikelModalLabel').html('Ubah Data Artikel');

    // mengembali tombol modal tambah menjadi ubah
    $('.modal-footer button[type=submit]').html('Ubah Data');

    // mengubah form attr action
    $('.modal-body form').attr(
      'action',
      'http://localhost/rental-mobil-ci/admin/artikel/ubahartikel'
    );

    // mengambali id berdasarkan yg di klik, data('id'), didapatkan di tombol ubah berita.
    const id = $(this).data('id');
    // console.log(id);

    $.ajax({
      url: 'http://localhost/rental-mobil-ci/admin/artikel/getubah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        // console.log(data);
        $('#id_berita').val(data.id_berita);
        $('#kategori').val(data.id_kategori);
        $('#judul').val(data.judul_berita);
        $('#deskripsi').val(data.deskripsi);
        $('#inputfoto').val(data.foto_berita);
        $('#tampilFoto').attr(
          'src',
          'http://localhost/rental-mobil-ci/assets/berita/' + data.foto_berita
        );
      },
    });
  });

  // ------------------ HALAMAN KATEGORI ADMIN----------------------------

  $('.formModalTambahArtikel').click(function () {
    $('#formModalLabel').html('Tambah Data Kategori');
    $('.modal-footer button[type=submit]').html('Tambah');

    $('#kategori').val('');
    $('#id_kategori').val('');
  });

  $('.formModalUbahArtikel').click(function () {
    $('#formModalLabel').html('Ubah Data Kategori');
    $('.modal-footer button[type=submit]').html('Ubah');

    $('.modal-body form').attr(
      'action',
      'http://localhost/rental-mobil-ci/admin/kategori/ubahkategori'
    );

    const id = $(this).data('id');
    // console.log(id);

    $.ajax({
      url: 'http://localhost/rental-mobil-ci/admin/kategori/getkategoriartikel',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        // console.log(data);
        $('#id_kategori').val(data.id_kategori);
        $('#kategori').val(data.nama_kategori);
      },
    });
  });

  // ------------------ HALAMAN BANK ADMIN-------------
  $('.tombolTambahBank').click(function () {
    $('#formBankModalLabel').html('Tambah Data Bank');
    $('button[type=submit]').html('Tambah');
  });

  $('.tombolUbahBank').click(function () {
    $('#formBankModalLabel').html('Ubah Data Bank');
    $('button[type=submit]').html('Ubah');

    $('.modal-body form').attr(
      'action',
      'http://localhost/rental-mobil-ci/admin/bank/ubahbank'
    );

    const id = $(this).data('id');
    // console.log(id);

    $.ajax({
      url: 'http://localhost/rental-mobil-ci/admin/bank/getubahbank',
      method: 'post',
      data: { id: id },
      dataType: 'json',
      success: function (data) {
        // console.log(data);
        $('#nama').val(data.nama_rek);
        $('#id_bank').val(data.id_bank);
        $('#no').val(data.no_rek);
      },
    });
  });
  $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
  });

  function validasiSaldo(e) {
    let saldo = $('.saldo').val();
    let namaAkun = $('#no_reff').val();

    if (saldo == '') {
      e.preventDefault();
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Saldo wajib di isi',
      });
    }

    if (namaAkun == '') {
      e.preventDefault();
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Nama Akun wajib di isi',
      });
    }
  }

  $('#button_jurnal').on('click', function (e) {
    validasiSaldo(e);
  });

  $('#button_akun').on('click', function (e) {
    let noReff = $('#no_reff').val();
    let nama = $('#nama').val();
    let keterangan = $('#keterangan').val();

    if (noReff == '') {
      e.preventDefault();
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'No.Reff wajib di isi',
      });
    } else if (nama == '') {
      e.preventDefault();
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Nama Reff wajib di isi',
      });
    } else if (keterangan == '') {
      e.preventDefault();
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Keterangan wajib di isi',
      });
    }
  });

  $('.hapus').on('click', function (e) {
    e.preventDefault();
    let form = $(this).parent();
    console.log(form);
    swal({
      title: 'Apakah data akan di hapus',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
    }).then((result) => {
      if (result.value) {
        form.submit();
      } else {
        swal('Aman!', 'Data Tidak Di Hapus', 'success');
      }
    });
  });

  $('.tab-nav').eq(0).addClass('active');
  $('.tab-pane').eq(0).addClass('show active');

  $('#no_reff').change(function () {
    let nilai = $(this).val();
    $('#reff').val(nilai);
  });

  $(window).on('load', function () {
    let nilai = $('#no_reff').val();
    $('#reff').val(nilai);
  });
});
$(document).ready(function () {});
