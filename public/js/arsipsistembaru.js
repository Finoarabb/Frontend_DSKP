// $(function () {
//     var base_url = $('.base_url').data('baseurl');
//     $('.folder').dblclick(function () {
//         const link = $(this).data('link');
//         location.href = base_url + 'dpm/arsipdokumen/' + link;
//     });
//     $('.dokumen_file').dblclick(function () {
//         const file = $(this).data('file');
//         window.open('https://docs.google.com/viewerng/viewer?url=' + base_url + 'assets/arsip/dokumen/' + file, '_blank');
//     });
//     // $('.folder').bind("contextmenu",function(e){
//     //     $('.klikkanan').show();
//     // });
//     // $('html').on('click', function(){
//     //     $('.klikkanan').hide();
//     // });

//     $('.rename-folder').on('click', function () {
//         const id = $(this).data('id');

//         $('#buatfolder').html('Rename Folder');
//         $('.modal-footer button[type=submit]').html('Rename');
//         $('.modal-body form').attr('action', base_url + 'admin/renamefolder/' + id);

//         $.ajax({
//             url: base_url + 'admin/getrenamefolder',
//             data: { id: id },
//             method: 'post',
//             dataType: 'json',
//             success: function (data) {
//                 $('#folder').val(data.name);
//             }
//         });
//     });


//     $('.rename-file').on('click', function () {
//         const id = $(this).data('id');

//         $('#buatfolder').html('Rename File');
//         $('.modal-footer button[type=submit]').html('Rename');
//         $('.modal-body form').attr('action', base_url + 'admin/renamefile/' + id);

//         $.ajax({
//             url: base_url + 'admin/getrenamefile',
//             data: { id: id },
//             method: 'post',
//             dataType: 'json',
//             success: function (data) {
//                 $('#folder').val(data.name);
//             }
//         });
//     });

//     $('#add_folder').on('click', function () {

//         $('#buatfolder').html('Buat Folder Baru');
//         $('.modal-footer button[type=submit]').html('Submit');
//         $('.modal-body form').attr('action', base_url + 'dpm/createfolder');

//         $('#folder').val('');
//     });


// });

$(document).ready(function () {
    $('#tabelsaya').DataTable({
        dom: '<"top"lf>rt<"bottom"ip><"clear">',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            filter: 'Cari: _SEARCH_',
            info: 'Menampilkan halaman _PAGE_ dari _PAGES_',
            zeroRecords: "Surat Belum Tersedia",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            },
            search: "Cari:"
        }
    });
    
    
    
    // $('.file-act').on('click', function () {
    //     window.open('https://docs.google.com/viewerng/viewer?url=https://dpm.stis.ac.id/assets/arsip/dokumen/ADART_Imapolstat_2021-2022.pdf');
    // });
    // $('.file-view').on('click', function () {
    //     window.open('https://docs.google.com/viewerng/viewer?url=https://dpm.stis.ac.id/assets/arsip/dokumen/ADART_Imapolstat_2021-2022.pdf');
    // });
    // $('.file-download').on('click', function () {
    //     window.open('https://dpm.stis.ac.id/dpm/downloadarsip/ADART_Imapolstat_2021-2022.pdf');
    // });
});

$(document).ready(function () {
    $('#tabeluser').DataTable({
        dom: '<"top"lf>rt<"bottom"ip><"clear">',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            filter: 'Cari: _SEARCH_',
            info: 'Menampilkan halaman _PAGE_ dari _PAGES_',
            zeroRecords: "User Tidak Ditemukan",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            },
            search: "Cari:"
        }
    });
});


$(document).ready(function () {
    var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'September', 'Oktober', "November", 'Desember']

    $('#tabelsaya td:nth-child(3)').each(function () {
        a = new Date($(this).html())
        b = bulan[a.getMonth()];
        $(this).html((String(`${a.getDate()} ${b} ${a.getFullYear()}`)));
    })
})