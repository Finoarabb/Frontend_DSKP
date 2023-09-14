$(function () {
    $('.lainnya').hide();
    var tujuan = $('#tujuan').val();
    $('#tujuan').change(function () {
        var tujuan = $('#tujuan').val();
        if (tujuan == 'Lainnya')
            $('.lainnya').show();
        else
            $('.lainnya').hide();
    });

    if (tujuan == 'Lainnya')
        $('.lainnya').show();
    else
        $('.lainnya').hide();

    var isiaspirasi = $('#dataaspirasi').data('isiaspirasi');
    if (isiaspirasi)
        $('#isi').html(isiaspirasi);


})

// if modal-btn is clicked
$('.view').on('click', function () {
    // get data from button attribute
    // image = $(this).parents('.card').find('.card-img-top').attr('src');
    // alt = $(this).parents('.card').find('.card-img-top').attr('alt');
    // get text from parent element and above 
    const title = $(this).parents('.card').find('#news-title').text();
    const text = $(this).parents('.card').find('#news-text').text();
    const date1 = $(this).parents('.card').find('#news-tanggal').val()
    const writer = $(this).parents('.card').find('#news-penulis').val()

    // translae date to indonesian
    const date2 = new Date(date1);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = date2.toLocaleDateString('id-ID', options);


    // console.log(title);
    // console.log(text);
    // console.log(date);
    // console.log(writer);

    // change modal content
    // $('.popup_image').attr('src', image);
    // $('.popup_image').attr('alt', alt);
    $('#modal-title').html(title);
    $('#modal-date').html(date)
    $('#modal-writer').html(writer)
    $('#modal-text').html(text)


    // show modal
    $('#tampilPengumumanAdminModal').modal('show');
});