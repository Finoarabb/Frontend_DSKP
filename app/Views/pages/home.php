<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div class="main-context">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center mb-1">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Dashboard</b>
            </div>
            <div class="col border-top border-primary d-none d-sm-block"></div>
        </div>
        <div class="row justify-content-end">
            <div class="mb-2">
                <div class="input-group filter">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> Bulan</div>
                    </div>
                    <input class="form-control" type="text" id="monthPicker" data-type="month">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="row dashboard">

                <div class="col-sm-3 utama1">
                    <p>
                        Surat Masuk
                    </p>
                    <span class="nilai" id="smbln"></span>
                </div>


                <div class="col-sm-3 utama2">
                    <p>Surat Terdisposisi </p>
                    <span class="nilai" id="stbln"></span>
                </div>
                <div class="col-sm-3 utama3">
                    <p>Surat Keluar </p>
                    <span class="nilai" id="skbln"></span>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="chart-container" id="chart1"></div>
        </div>
    </div>





</div>

<script>
    function utama(bulan) {

        $.ajax({
            url: '<?= base_url(); ?>/dashboard', // Replace with the actual URL
            method: 'POST',
            dataType: 'json',
            data: {
                bulan: bulan
            },
            success: function(data) {
                $('#smbln').text(data.srtmasuk)
                $('#stbln').text(data.propDisposisi)
                $('#skbln').text(data.srtkeluar)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            }
        });
    }
    $(document).ready(() => {

        const data = <?= $data; ?>;
        // $('#smbln').text(data.srtmasuk[0]);
        // $('#skbln').text(data.srtkeluar[0]);
        // $('#stbln').text(data.propDisposisi)

        let dateLabels = [];
        let currentDate = new Date();

        for (let i = 11; i >= 0; i--) {
            let date = new Date(currentDate);
            date.setMonth(currentDate.getMonth() - i);
            let month = date.toLocaleString('default', {
                month: 'short'
            });
            dateLabels.push(`${month} ${date.getFullYear()}`);
        }
        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        var formattedDate = months[currentDate.getMonth()] + "/" + currentDate.getFullYear();
        const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $('#monthPicker').monthpicker({
            target: '#monthPicker',
            dateFormat: 'MM/yy', // Use four "m"s for full month name
            monthNames: monthNames,
            monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
            onSelect: function(month) {
                let temp = month.split('/')
                let bulan = String(monthNames.indexOf(temp[0]) + 1 + '/' + temp[1])
                utama(bulan);
            }
        }).val(formattedDate);
        month = $('#monthPicker').val();
        let temp = month.split('/')
        let bulan = String(monthNames.indexOf(temp[0]) + 1 + '/' + temp[1])
        utama(bulan);


        var options1 = {
            chart: {
                // toolbar:{show:false},
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    blur: 10,
                    opacity: 0.2
                },
                height: 400
            },
            series: [{
                name: 'Surat Masuk',
                data: data.srtmasuk.slice(0, 12).reverse()
            }, {
                name: 'Surat Keluar',
                data: data.srtkeluar.slice(0, 12).reverse()
            }],
            xaxis: {
                categories: dateLabels
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val.toFixed(0); // Format to two decimal places
                    }
                },
            },
            title: {
                text: 'Jumlah Surat Masuk dan Keluar 12 Bulan Terakhir'
            }
        }

        var chart1 = new ApexCharts($("#chart1")[0], options1);
        chart1.render();








    });
</script>
<?php $this->endSection(); ?>