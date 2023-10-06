<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div class="main-context">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center mb-4">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Dashboard</b>
            </div>
            <div class="col border-top border-primary d-none d-sm-block"></div>
        </div>
        <div class="card-deck text-white mx-auto" style="width: fit-content; font-family:'Poppins',sans-serif">
            <div class="card bg-primary">
                <div class="card-header text-center bg-success">
                    <h5 class="card-title text-dark mb-0">Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-auto">
                            <i class="fas fa-fw fa-envelope fa-5x"></i>
                        </div>
                        <div class="col p-0 text-center my-auto">
                            <h5 class="mb-0">Bulan ini
                                <span class="text-warning" id="smbln"></span>
                            </h5>
                            <hr class="m-0">
                            <h5>Keseluruhan
                                <span class="text-success" id="smttl"></span>
                            </h5>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card bg-primary">
                <div class="card-header text-center bg-danger">
                    <h5 class="card-title text-dark mb-0">Surat Keluar</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-auto">
                            <i class="fas fa-fw fa-envelope fa-5x"></i>
                        </div>
                        <div class="col p-0 text-center my-auto">
                            <h5 class="mb-0">Bulan ini
                                <span class="text-warning" id="skbln"></span>
                            </h5>
                            <hr class="m-0">
                            <h5>Keseluruhan
                                <span class="text-success" id="skttl"></span>
                            </h5>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="chart-container" id="chart1"></div>
            </div>
            <div class="col">
                <div class="chart-container" id="chart2"></div>
                <div class="chart-container" id="chart3"></div>
            </div>
        </div>




    </div>

</div>

<script>
    $(document).ready(() => {
        const data = <?= $data; ?>;
        $('#smbln').text(data.srtmasuk[0]);
        $('#skbln').text(data.srtkeluar[0]);

        let smsum = 0;
        $.each(data.srtmasuk, function() {
            smsum += parseInt(this)
        });
        let sksum = 0;
        $.each(data.srtkeluar, function() {
            sksum += parseInt(this)
        });
        $('#smttl').text(smsum);
        $('#skttl').text(sksum);
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



        var options1 = {
            chart: {
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    blur: 10,
                    opacity: 0.2
                },
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
                text: 'Keluar Masuk Surat 12 Bulan Terakhir'
            }
        }

        var chart1 = new ApexCharts($("#chart1")[0], options1);
        chart1.render();

        var propBulanIni = [data.propDisposisi[0], data.propApproval[0]];
        var propAll = [
            (data.propDisposisi.reduce((acc, curr) => acc + curr) * 100 / smsum).toFixed(2),
            (data.propApproval.reduce((acc, curr) => acc + curr) * 100 / smsum).toFixed(2)
        ];



        var options2 = {
            series: propBulanIni,
            chart: {

                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,

                },
            },
            title: {
                text: 'Proporsi Surat Bulan ini',
                align: 'center'
            },
            labels: ['Menunggu Disposisi', 'Menunggu Approval'],
        };

        var chart2 = new ApexCharts($("#chart2")[0], options2);
        chart2.render();



        var options3 = {
            series: propAll,
            chart: {
                offset: -20,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,

                }
            },
            title: {
                text: 'Proporsi Surat Keseluruhan',
                align: 'center'
            },
            labels: ['Menunggu Disposisi', 'Menunggu Approval'],
        };

        var chart3 = new ApexCharts($("#chart3")[0], options3);
        chart3.render();



    });
</script>
<?php $this->endSection(); ?>