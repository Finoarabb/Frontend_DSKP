$(function () {
    var base_url = $('.base_url').data('baseurl');
    $('#select-bulan').on('change', function() {
        const bulan = $(this).val();       
        location.href = base_url + 'laporan/statistikreimburse?bulan='+bulan;
    });
});