$(document).ready(function () {
  var base_url = $('.base_url').data('baseurl');
  const flashData = $('#message').data('flashdata');
  if (flashData) {
    Swal.fire({
      icon: 'success',
      title: 'Anda Berhasil',
      html: '<b>'+flashData+'!</b>'
    });
  }

  const login_error = $('#login_error').data('flashdata');
  if (login_error) {
    Swal.fire({
      title: 'Maaf',
      html: '<b style="color: red;">Anda tidak memiliki akses pada Web DPM!</b> <br> Silakan hubungi Aspiman Web dengan menyertakan NIM, nama, dan kelas ya! <br> <a href="https://wa.me/6289691077371" target="_blank">Klik untuk menuju WhatsApp</a>',
      icon: 'error',
      confirmButtonColor: '#3085d6'
    });
  }

  $('.hapus-dokumen').on('click', function (e) {
    e.preventDefault(); //Mematikan href

    const href = $(this).attr('href');
    var dokname = $(this).data('dokname');
    Swal.fire({
      title: 'Apakah Anda Yakin',
      html: 'untuk menghapus dokumen <b>'+dokname+'</b> ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {     
        $.ajax({
          url: href,
          success: function() {
            // document.location.href = base_url + 'dpm/arsipdokumen/' + parent;
            location.reload();
          }
        });
      }
    });
  });

  $('.hapus-folder').on('click', function (e) {
    e.preventDefault(); //Mematikan href

    const href = $(this).attr('href');
    var foldername = $(this).data('foldername');
    Swal.fire({
      title: 'Apakah Anda Yakin',
      html: 'untuk menghapus folder <b>'+foldername+'</b> ?<br>Tindakan ini akan menghapus seluruh folder dan file yang ada dalam folder ini.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {     
        $.ajax({
          url: href,
          success: function() {
          // document.location.href = base_url + 'dpm/arsipdokumen/' + parent;
            location.reload();
          }
        });
      }
    });
  });

  $('.btn-delete').on('click', function (e) {
    const message = $(this).data('message');
    const url = $(this).data('url');
    const key = $(this).data('key');
    Swal.fire({
        title: 'Apakah Anda Yakin',
        html: '<b>untuk menghapus <span style="color: red;">' + message + '</span> ?</b>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = base_url + '/' + url + '/' + key;
      }
    });
  });
});